<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Beneficio;
use App\Models\TiposBeneficio;
use App\Models\Persona;
use App\Models\Auditoria;
use Carbon\Carbon;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

class Beneficios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $persona_id, $tipos_beneficio_id, $fecha_entrega, $descripcion,$tiposBeneficios, $personas;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.beneficios.view', [
            'beneficios' => Beneficio::latest()
						->orWhere('persona_id', 'LIKE', $keyWord)
						->orWhere('tipos_beneficio_id', 'LIKE', $keyWord)
						->orWhere('fecha_entrega', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->persona_id = null;
		$this->tipos_beneficio_id = null;
		$this->fecha_entrega = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
            'persona_id' => 'required|exists:personas,id',
            'tipos_beneficio_id' => 'required|exists:tipos_beneficio,id',
            'descripcion' => 'required|string|max:500'
        ], [
            'persona_id.required' => 'La persona es obligatoria.',
            'persona_id.exists' => 'La persona seleccionada no es válida.',
            'tipos_beneficio_id.required' => 'El tipo de beneficio es obligatorio.',
            'tipos_beneficio_id.exists' => 'El tipo de beneficio seleccionado no es válido.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.max' => 'La descripción no debe exceder los 500 caracteres.'
        ]);

        // Verificar si ya existe el beneficio para esta persona
        $beneficioExistente = Beneficio::where('persona_id', $this->persona_id)
        ->where('tipos_beneficio_id', $this->tipos_beneficio_id)
        ->first();

        if ($beneficioExistente) {
    
           $this->resetInput();
           $this->dispatchBrowserEvent('closeModal');
            session()->flash('error', 'Esta persona ya tiene asignado este beneficio.');
            return;
        }

        // Si no existe, crear el nuevo beneficio
        Beneficio::create([ 
            'persona_id' => $this->persona_id,
            'tipos_beneficio_id' => $this->tipos_beneficio_id,
            'fecha_entrega' => Carbon::now(),
            'descripcion' => $this->descripcion
        ]);

        // Registro de auditoria
        Auditoria::create([ 
            'usuario_id' => Auth::user()->id,
            'descripcion' => 'El usuario ha asignado un beneficio',
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Beneficio creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Beneficio::findOrFail($id);
        $this->selected_id = $id; 
		$this->persona_id = $record-> persona_id;
		$this->tipos_beneficio_id = $record-> tipos_beneficio_id;
		$this->fecha_entrega = $record-> fecha_entrega;
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
            'persona_id' => 'required|exists:personas,id',
            'tipos_beneficio_id' => 'required|exists:tipos_beneficio,id',
            'descripcion' => 'required|string|max:500'
        ], [
            'persona_id.required' => 'La persona es obligatoria.',
            'persona_id.exists' => 'La persona seleccionada no es válida.',
            'tipos_beneficio_id.required' => 'El tipo de beneficio es obligatorio.',
            'tipos_beneficio_id.exists' => 'El tipo de beneficio seleccionado no es válido.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.max' => 'La descripción no debe exceder los 500 caracteres.'
        ]);

    // Verificar si ya existe otro beneficio con la misma combinación
        $beneficioExistente = Beneficio::where('persona_id', $this->persona_id)
        ->where('tipos_beneficio_id', $this->tipos_beneficio_id)
        ->where('id', '!=', $this->selected_id) // Excluir el registro actual
        ->first();

        if ($beneficioExistente) {
          $this->resetInput();
          $this->dispatchBrowserEvent('closeModal');
          session()->flash('error', 'Esta persona ya tiene asignado este beneficio.');
          return;
        }

        if ($this->selected_id) {
            $record = Beneficio::find($this->selected_id);
            $record->update([ 
                'persona_id' => $this->persona_id,
                'tipos_beneficio_id' => $this->tipos_beneficio_id,
                'descripcion' => $this->descripcion
            ]);

        // Registro de auditoria
            Auditoria::create([ 
                'usuario_id' => Auth::user()->id,
                'descripcion' => 'El usuario ha actualizado el beneficio de una persona',
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Beneficio actualizado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Beneficio::where('id', $id)->delete();
        }
    }

    public function mount(){

	$this->tiposBeneficios = TiposBeneficio::all();
	$this->personas = Persona::where('estado',1)->get();
    }
}