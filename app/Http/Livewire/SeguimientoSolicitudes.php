<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SeguimientoSolicitude;
use App\Models\Auditoria;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

class SeguimientoSolicitudes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $solicitud_id, $persona_id, $fecha_seguimiento, $estado_anterior, $estado_nuevo, $observaciones;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.seguimientoSolicitudes.view', [
            'seguimientoSolicitudes' => SeguimientoSolicitude::latest()
						->orWhere('solicitud_id', 'LIKE', $keyWord)
						->orWhere('persona_id', 'LIKE', $keyWord)
						->orWhere('fecha_seguimiento', 'LIKE', $keyWord)
						->orWhere('estado_anterior', 'LIKE', $keyWord)
						->orWhere('estado_nuevo', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->solicitud_id = null;
		$this->persona_id = null;
		$this->fecha_seguimiento = null;
		$this->estado_anterior = null;
		$this->estado_nuevo = null;
		$this->observaciones = null;
    }

    public function store()
    {
        $this->validate([
		'solicitud_id' => 'required',
		'persona_id' => 'required',
		'fecha_seguimiento' => 'required',
		'estado_anterior' => 'required',
		'estado_nuevo' => 'required',
		'observaciones' => 'required',
        ]);

        SeguimientoSolicitude::create([ 
			'solicitud_id' => $this-> solicitud_id,
			'persona_id' => $this-> persona_id,
			'fecha_seguimiento' => $this-> fecha_seguimiento,
			'estado_anterior' => $this-> estado_anterior,
			'estado_nuevo' => $this-> estado_nuevo,
			'observaciones' => $this-> observaciones
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'SeguimientoSolicitude Successfully created.');
    }

    public function edit($id)
    {
        $record = SeguimientoSolicitude::findOrFail($id);
        $this->selected_id = $id; 
		$this->solicitud_id = $record-> solicitud_id;
		$this->persona_id = $record-> persona_id;
		$this->fecha_seguimiento = $record-> fecha_seguimiento;
		$this->estado_anterior = $record-> estado_anterior;
		$this->estado_nuevo = $record-> estado_nuevo;
		$this->observaciones = $record-> observaciones;
    }

    public function update()
    {
        $this->validate([
		'solicitud_id' => 'required',
		'persona_id' => 'required',
		'fecha_seguimiento' => 'required',
		'estado_anterior' => 'required',
		'estado_nuevo' => 'required',
		'observaciones' => 'required',
        ]);

        if ($this->selected_id) {
			$record = SeguimientoSolicitude::find($this->selected_id);
            $record->update([ 
			'solicitud_id' => $this-> solicitud_id,
			'persona_id' => $this-> persona_id,
			'fecha_seguimiento' => $this-> fecha_seguimiento,
			'estado_anterior' => $this-> estado_anterior,
			'estado_nuevo' => $this-> estado_nuevo,
			'observaciones' => $this-> observaciones
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'SeguimientoSolicitude Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            SeguimientoSolicitude::where('id', $id)->delete();
        }
    }
}