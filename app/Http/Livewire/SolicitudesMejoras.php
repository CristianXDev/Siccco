<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SolicitudesMejora;
use App\Models\TiposSolicitud;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Auditoria;

class SolicitudesMejoras extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipos_solicitud_id, $persona_id, $fecha_creacion, $fecha_cierre;
    public $descripcion, $observaciones, $estado, $responsable_id, $comentarios_cierre;
    public $tiposSolicitudes, $personas, $responsables;

    // Reglas de validación centralizadas
    protected $rules = [
        'tipos_solicitud_id' => 'required|exists:tipos_solicitud,id',
        'persona_id' => 'required|exists:personas,id',
        'descripcion' => 'required|string|min:20|max:1000',
        'observaciones' => 'nullable|string|max:500',
        'responsable_id' => 'nullable|exists:users,id',
        'estado' => 'required|in:En Revision,Completada,Rechazada,Recibida',
        'comentarios_cierre' => 'nullable|required_if:estado,Cerrada|string|max:500'
    ];

    // Mensajes personalizados para las validaciones
    protected $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'exists' => 'El valor seleccionado en :attribute no es válido.',
        'min' => 'El campo :attribute debe tener al menos :min caracteres.',
        'max' => 'El campo :attribute no debe exceder :max caracteres.',
        'in' => 'El estado seleccionado no es válido.',
        'required_if' => 'Los comentarios de cierre son requeridos cuando el estado es "Cerrada".'
    ];

    public function render()
    {
        $keyWord = '%'.$this->keyWord.'%';
        return view('livewire.solicitudes-mejoras.view', [
            'solicitudesMejoras' => SolicitudesMejora::with(['tiposSolicitud', 'persona', 'user'])
                ->latest()
                ->where(function($query) use ($keyWord) {
                    $query->whereHas('tiposSolicitud', function($q) use ($keyWord) {
                        $q->where('nombre', 'LIKE', $keyWord);
                    })
                    ->orWhereHas('persona', function($q) use ($keyWord) {
                        $q->where('nombres', 'LIKE', $keyWord)
                          ->orWhere('apellidos', 'LIKE', $keyWord);
                    })
                    ->orWhere('descripcion', 'LIKE', $keyWord)
                    ->orWhere('observaciones', 'LIKE', $keyWord)
                    ->orWhere('estado', 'LIKE', $keyWord)
                    ->orWhereHas('user', function($q) use ($keyWord) {
                        $q->where('nombre', 'LIKE', $keyWord);
                    })
                    ->orWhere('comentarios_cierre', 'LIKE', $keyWord);
                })
                ->paginate(10),
        ]);
    }
    
    public function mount()
    {
        $this->tiposSolicitudes = TiposSolicitud::all();
        $this->personas = Persona::orderBy('nombres')->get();
        $this->responsables = User::where('estatus', 'activo')->orderBy('nombre')->get();
        $this->fecha_creacion = Carbon::now()->format('Y-m-d');
        $this->estado = 'En Revision';
    }
    
    public function cancel()
    {
        $this->resetInput();
        $this->resetErrorBag();
    }
    
    private function resetInput()
    {        
        $this->tipos_solicitud_id = null;
        $this->persona_id = null;
        $this->descripcion = null;
        $this->observaciones = null;
        $this->estado = 'En Revision';
        $this->responsable_id = null;
        $this->comentarios_cierre = null;
    }

    public function store()
    {
        // Validación específica para creación
        $this->validate(array_merge($this->rules, [
            'fecha_creacion' => 'required|date|before_or_equal:today',
        ]));

        // Asignar automáticamente al usuario actual si no se seleccionó responsable
        $responsableId = $this->responsable_id ?? Auth::id();

        SolicitudesMejora::create([ 
            'tipos_solicitud_id' => $this->tipos_solicitud_id,
            'persona_id' => $this->persona_id,
            'fecha_creacion' => $this->fecha_creacion,
            'descripcion' => $this->descripcion,
            'observaciones' => $this->observaciones,
            'estado' => $this->estado,
            'responsable_id' => $responsableId,
            'user_created' => Auth::id()
        ]);

        //Registro de auditoria
        Auditoria::create([ 
            'usuario_id' => Auth::user()->id,
            'descripcion' => 'El usuario ha agregado una solicitud',
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('success', 'Solicitud de mejora creada exitosamente.');
    }

    public function edit($id)
    {
        $record = SolicitudesMejora::findOrFail($id);
        $this->selected_id = $id; 
        $this->tipos_solicitud_id = $record->tipos_solicitud_id;
        $this->persona_id = $record->persona_id;
        $this->fecha_creacion = $record->fecha_creacion;
        $this->fecha_cierre = $record->fecha_cierre;
        $this->descripcion = $record->descripcion;
        $this->observaciones = $record->observaciones;
        $this->estado = $record->estado;
        $this->responsable_id = $record->responsable_id;
        $this->comentarios_cierre = $record->comentarios_cierre;
    }

    public function update()
    {
        // Validación adicional para actualización
        $this->validate(array_merge($this->rules, [
            'fecha_cierre' => 'nullable|date|after_or_equal:fecha_creacion',
        ]));

        if ($this->selected_id) {
            $record = SolicitudesMejora::find($this->selected_id);
            
            // Si el estado cambia a "Cerrada", registrar fecha de cierre
            $fechaCierre = $this->estado === 'Completada' && !$record->fecha_cierre 
                ? Carbon::now() 
                : $this->fecha_cierre;

            $record->update([ 
                'tipos_solicitud_id' => $this->tipos_solicitud_id,
                'persona_id' => $this->persona_id,
                'fecha_cierre' => $fechaCierre,
                'descripcion' => $this->descripcion,
                'observaciones' => $this->observaciones,
                'estado' => $this->estado,
                'responsable_id' => $this->responsable_id,
                'comentarios_cierre' => $this->comentarios_cierre,
                'user_updated' => Auth::id()
            ]);

            //Registro de auditoria
            Auditoria::create([ 
            'usuario_id' => Auth::user()->id,
            'descripcion' => 'El usuario ha editado una solicitud',
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('success', 'Solicitud de mejora actualizada exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = SolicitudesMejora::find($id);
            $record->update([
                'user_deleted' => Auth::id()
            ]);
            $record->delete();
            
            session()->flash('success', 'Solicitud de mejora eliminada exitosamente.');
        }
    }
}