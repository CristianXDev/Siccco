<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TiposSolicitud;
use App\Models\Auditoria;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

class TiposSolicituds extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $descripcion, $prioridad;

    // Reglas de validación centralizadas
    protected $rules = [
        'nombre' => 'required|string|max:100|unique:tipos_solicitud,nombre',
        'descripcion' => 'required|string|max:255',
        'prioridad' => 'required|in:alta,media,baja'
    ];

    // Mensajes personalizados para las validaciones
    protected $messages = [
        'nombre.required' => 'El nombre del tipo de solicitud es obligatorio.',
        'nombre.max' => 'El nombre no debe exceder los 100 caracteres.',
        'nombre.unique' => 'Este tipo de solicitud ya existe.',
        'descripcion.required' => 'La descripción es obligatoria.',
        'descripcion.max' => 'La descripción no debe exceder los 255 caracteres.',
        'prioridad.required' => 'Debe seleccionar una prioridad.',
        'prioridad.in' => 'La prioridad seleccionada no es válida.'
    ];

    public function render()
    {
        $keyWord = '%'.$this->keyWord.'%';
        return view('livewire.tipos-solicituds.view', [
            'tiposSolicituds' => TiposSolicitud::latest()
            ->orWhere('nombre', 'LIKE', $keyWord)
            ->orWhere('descripcion', 'LIKE', $keyWord)
            ->orWhere('prioridad', 'LIKE', $keyWord)
            ->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->resetErrorBag();
    }

    private function resetInput()
    {        
        $this->nombre = null;
        $this->descripcion = null;
        $this->prioridad = null;
    }

    public function store()
    {
        // Validación con reglas y mensajes personalizados
        $this->validate();

        TiposSolicitud::create([ 
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'prioridad' => $this->prioridad
        ]);

        //Registro de auditoria
        Auditoria::create([ 
            'usuario_id' => Auth::user()->id,
            'descripcion' => 'El usuario ha agregado el tipo de solicitud: '. $this->nombre,
        ]);
        
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('success', 'Tipo de solicitud creado exitosamente.');
    }

    public function edit($id)
    {
        $record = TiposSolicitud::findOrFail($id);
        $this->selected_id = $id; 
        $this->nombre = $record->nombre;
        $this->descripcion = $record->descripcion;
        $this->prioridad = $record->prioridad;
        
        // Actualizar regla de validación para ignorar el nombre actual en la edición
        $this->rules['nombre'] = 'required|string|max:100|unique:tipos_solicituds,nombre,'.$this->selected_id;
    }

    public function update()
    {
        // Validación con reglas actualizadas
        $this->validate();

        if ($this->selected_id) {
            $record = TiposSolicitud::find($this->selected_id);
            $record->update([ 
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'prioridad' => $this->prioridad
            ]);

            //Registro de auditoria
            Auditoria::create([ 
                'usuario_id' => Auth::user()->id,
                'descripcion' => 'El usuario ha editado el tipo de solicitud: '. $this->nombre,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('success', 'Tipo de solicitud actualizado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            TiposSolicitud::where('id', $id)->delete();
            session()->flash('success', 'Tipo de solicitud eliminado exitosamente.');
        }
    }
}