<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HistorialCarnet;
use App\Models\Persona;
use App\Models\Carnet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Auditoria;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

class HistorialCarnets extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $persona_id, $codigo_carnet, $fecha_cambio, $nivel_educativo, $observaciones;
    public $personas, $carnets;

    // Reglas de validación
    protected $rules = [
        'persona_id' => 'required|exists:personas,id',
        'codigo_carnet' => 'required|exists:carnets,id',
        'nivel_educativo' => 'required|in:Renovacion,Perdida',
        'observaciones' => 'nullable|string|max:255'
    ];

    // Mensajes de validación personalizados
    protected $messages = [
        'persona_id.required' => 'La selección de persona es obligatoria.',
        'persona_id.exists' => 'La persona seleccionada no existe.',
        'codigo_carnet.required' => 'La selección de carnet es obligatoria.',
        'codigo_carnet.exists' => 'El carnet seleccionado no existe.',
        'nivel_educativo.required' => 'Debe seleccionar el tipo de problema.',
        'nivel_educativo.in' => 'El tipo de problema seleccionado no es válido.',
        'observaciones.max' => 'Las observaciones no deben exceder los 255 caracteres.'
    ];

    public function render()
    {
        $keyWord = '%'.$this->keyWord.'%';
        return view('livewire.historial-carnets.view', [
            'historialCarnets' => HistorialCarnet::latest()
                ->orWhere('persona_id', 'LIKE', $keyWord)
                ->orWhere('codigo_carnet', 'LIKE', $keyWord)
                ->orWhere('fecha_cambio', 'LIKE', $keyWord)
                ->orWhere('nivel_educativo', 'LIKE', $keyWord)
                ->orWhere('observaciones', 'LIKE', $keyWord)
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
        $this->persona_id = null;
        $this->codigo_carnet = null;
        $this->fecha_cambio = null;
        $this->nivel_educativo = null;
        $this->observaciones = null;
    }

    public function store()
    {
        $this->validate();

        DB::transaction(function () {
            // Registrar el historial
            $historial = HistorialCarnet::create([ 
                'persona_id' => $this->persona_id,
                'codigo_carnet' => $this->codigo_carnet,
                'fecha_cambio' => Carbon::now(),
                'nivel_educativo' => $this->nivel_educativo,
                'observaciones' => $this->observaciones
            ]);

            // Obtener el carnet actual
            $carnetActual = Carnet::find($this->codigo_carnet);
            
            if ($this->nivel_educativo === 'Renovacion') {
                // Crear nuevo carnet para renovación
                $nuevoCarnet = Carnet::create([
                    'persona_id' => $this->persona_id,
                    'numero_carnet' => $this->generarNumeroCarnet(),
                    'fecha_emision' => Carbon::now()->format('Y-m-d'),
                    'fecha_vencimiento' => Carbon::now()->addYear()->format('Y-m-d'),
                    'qr' => $this->generarQRCode(),
                    'estado' => 1
                ]);
                
                // Actualizar el carnet anterior
                $carnetActual->update(['estado' => 0]);
                
            } elseif ($this->nivel_educativo === 'Perdida') {
                // Solo desactivar el carnet en caso de pérdida
                $carnetActual->update(['estado' => 0]);
            }
        });

        //Registro de auditoria
        Auditoria::create([ 
            'usuario_id' => Auth::user()->id,
            'descripcion' => 'El usuario ha hecho un reporte de un carnet',
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('success', 'Reporte de carnet registrado exitosamente.');
    }

    public function edit($id)
    {
        $record = HistorialCarnet::findOrFail($id);
        $this->selected_id = $id; 
        $this->persona_id = $record->persona_id;
        $this->codigo_carnet = $record->codigo_carnet;
        $this->fecha_cambio = $record->fecha_cambio;
        $this->nivel_educativo = $record->nivel_educativo;
        $this->observaciones = $record->observaciones;
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
            $record = HistorialCarnet::find($this->selected_id);
            $record->update([ 
                'persona_id' => $this->persona_id,
                'codigo_carnet' => $this->codigo_carnet,
                'fecha_cambio' => $this->fecha_cambio,
                'nivel_educativo' => $this->nivel_educativo,
                'observaciones' => $this->observaciones
            ]);

            //Registro de auditoria
            Auditoria::create([ 
                'usuario_id' => Auth::user()->id,
                'descripcion' => 'El usuario ha editado el reporte de un carnet',
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('success', 'Registro de historial actualizado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            HistorialCarnet::where('id', $id)->delete();
            session()->flash('success', 'Registro de historial eliminado exitosamente.');
        }
    }

    public function mount()
    {
        $this->personas = Persona::all();
        $this->carnets = Carnet::where('estado', 1)->get(); // Solo carnets activos
    }

    private function generarNumeroCarnet()
    {
        $ultimoCarnet = Carnet::orderBy('id', 'desc')->first();
        $ultimoNumero = $ultimoCarnet ? intval($ultimoCarnet->numero_carnet) : 0;
        return $ultimoNumero + 1;
    }

    private function generarQRCode()
    {
        return 'QR-' . now()->timestamp . '-' . bin2hex(random_bytes(2));
    }
}