<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Carnet;
use App\Models\TiposBeneficio;
use App\Models\Persona;
use App\Models\Auditoria;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

class Carnets extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $persona_id, $tipos_beneficio_id, $personas, $tiposBeneficios, $estado;

	public function render()
	{
		$keyWord = '%'.$this->keyWord .'%';
		return view('livewire.carnets.view', [
			'carnets' => Carnet::latest()
			->orWhere('persona_id', 'LIKE', $keyWord)
			->orWhere('numero_carnet', 'LIKE', $keyWord)
			->orWhere('fecha_emision', 'LIKE', $keyWord)
			->orWhere('fecha_vencimiento', 'LIKE', $keyWord)
			->orWhere('qr', 'LIKE', $keyWord)
			->orWhere('estado', 'LIKE', $keyWord)
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
	}

	public function store()
	{
		$this->validate([
			'persona_id' => 'required|unique:carnets,persona_id',
		]);

        // Generar valores automáticos
		$numeroCarnet = $this->generarNumeroCarnet();
		$qrCode = $this->generarQRCode();
		$fechaEmision = now()->format('Y-m-d');
        $fechaVencimiento = now()->addYear()->format('Y-m-d'); // 1 año de validez
        $estado = 1;

        Carnet::create([ 
        	'persona_id' => $this->persona_id,
        	'numero_carnet' => $numeroCarnet,
        	'fecha_emision' => $fechaEmision,
        	'fecha_vencimiento' => $fechaVencimiento,
        	'qr' => $qrCode,
        	'estado' => $estado
        ]);

        //Registro de auditoria
        Auditoria::create([ 
        	'usuario_id' => Auth::user()->id,
        	'descripcion' => 'El usuario ha creado un carnet',
        ]);
        

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Carnet creado exitosamente.');
    }

    public function edit($id)
    {
    	$record = Carnet::findOrFail($id);
    	$this->selected_id = $id; 
    	$this->persona_id = $record->persona_id;
    	$this->estado = $record->estado;
    	$this->tipos_beneficio_id = $record->tipos_beneficio_id;
    }

    public function update()
    {
    	$this->validate([
    		'persona_id' => 'required',
    		'estado' => 'required',
    	]);

    	if ($this->selected_id) {
    		$record = Carnet::find($this->selected_id);
    		$record->update([ 
    			'persona_id' => $this->persona_id,
    			'estado' => $this->estado
    		]);

        	//Registro de auditoria
    		Auditoria::create([ 
    			'usuario_id' => Auth::user()->id,
    			'descripcion' => 'El usuario ha actualizado un carnet',
    		]);

    		$this->resetInput();
    		$this->dispatchBrowserEvent('closeModal');
    		session()->flash('message', 'Carnet actualizado exitosamente.');
    	}
    }

    public function destroy($id)
    {
    	if ($id) {
    		Carnet::where('id', $id)->delete();
    	}
    }

    public function mount()
    {
    	$this->personas = Persona::where('estado',1)->get();
    }

    private function generarNumeroCarnet(){

        // Generar número secuencial basado en el último carnet creado
    	$ultimoCarnet = Carnet::orderBy('id', 'desc')->first();
    	$ultimoNumero = $ultimoCarnet ? intval($ultimoCarnet->numero_carnet) : 0;
    	return $ultimoNumero + 1;
    }

    private function generarQRCode()
    {
        // Genera un código QR único basado en timestamp y random
    	return 'QR-' . now()->timestamp . '-' . bin2hex(random_bytes(2));
    }
}