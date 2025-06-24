<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TiposBeneficio;
use App\Models\Auditoria;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

class TiposBeneficios extends Component{

    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $descripcion;

    public function render(){

		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipos-beneficios.view', [
            'tiposBeneficios' => TiposBeneficio::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel(){

        $this->resetInput();
    }
	
    private function resetInput(){

		$this->nombre = null;
		$this->descripcion = null;
    }

    public function store(){

        $this->validate([
            'nombre' => 'required|string|max:100|unique:tipos_beneficio,nombre',
            'descripcion' => 'required|string|max:255',
        ], [
            'nombre.required' => 'El nombre del beneficio es obligatorio.',
            'nombre.max' => 'El nombre no debe exceder los 100 caracteres.',
            'nombre.unique' => 'Este tipo de beneficio ya existe.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.max' => 'La descripción no debe exceder los 255 caracteres.',
        ]);

        TiposBeneficio::create([ 
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion
        ]);

        //Registro de auditoria
        Auditoria::create([ 
        'usuario_id' => Auth::user()->id,
        'descripcion' => 'El usuario ha agregado el beneficio: '. $this->nombre,
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Proceso Completado');
    }

    public function edit($id){

        $record = TiposBeneficio::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;
    }

    public function update(){

       $this->validate([
        'nombre' => 'required|string|max:100|unique:tipos_beneficio,nombre,'.$this->selected_id,
            'descripcion' => 'required|string|max:255',
        ], [
            'nombre.required' => 'El nombre del beneficio es obligatorio.',
            'nombre.max' => 'El nombre no debe exceder los 100 caracteres.',
            'nombre.unique' => 'Este tipo de beneficio ya existe.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.max' => 'La descripción no debe exceder los 255 caracteres.',
        ]);

        if ($this->selected_id) {
			$record = TiposBeneficio::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion
            ]);

            //Registro de auditoria
            Auditoria::create([ 
            'usuario_id' => Auth::user()->id,
            'descripcion' => 'El usuario ha editado el beneficio: '. $this->nombre,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Proceso Completado');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            TiposBeneficio::where('id', $id)->delete();
        }
    }
}