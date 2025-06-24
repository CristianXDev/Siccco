<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Persona;
use App\Models\Auditoria;
use Carbon\Carbon;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

class Personas extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $nombres, $apellidos, $cedula, $sexo, $fecha_nacimiento, $estado_civil, $direccion, $telefono, $correo, $ingresos, $carga_familiar, $tiene_carnet, $fecha_registro, $estado;

	public function render()
	{
		$keyWord = '%'.$this->keyWord .'%';
		return view('livewire.personas.view', [
			'personas' => Persona::latest()
			->orWhere('nombres', 'LIKE', $keyWord)
			->orWhere('apellidos', 'LIKE', $keyWord)
			->orWhere('cedula', 'LIKE', $keyWord)
			->orWhere('sexo', 'LIKE', $keyWord)
			->orWhere('fecha_nacimiento', 'LIKE', $keyWord)
			->orWhere('estado_civil', 'LIKE', $keyWord)
			->orWhere('direccion', 'LIKE', $keyWord)
			->orWhere('telefono', 'LIKE', $keyWord)
			->orWhere('correo', 'LIKE', $keyWord)
			->orWhere('ingresos', 'LIKE', $keyWord)
			->orWhere('carga_familiar', 'LIKE', $keyWord)
			->orWhere('tiene_carnet', 'LIKE', $keyWord)
			->orWhere('fecha_registro', 'LIKE', $keyWord)
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
		$this->nombres = null;
		$this->apellidos = null;
		$this->cedula = null;
		$this->sexo = null;
		$this->fecha_nacimiento = null;
		$this->estado_civil = null;
		$this->direccion = null;
		$this->telefono = null;
		$this->correo = null;
		$this->ingresos = null;
		$this->carga_familiar = null;
		$this->tiene_carnet = null;
		$this->fecha_registro = null;
		$this->estado = null;
	}

	public function store(){

		
		$this->validate([
			'nombres' => 'required|string|max:100|regex:/^[\pL\s\-]+$/u',
			'apellidos' => 'required|string|max:100|regex:/^[\pL\s\-]+$/u',
			'cedula' => 'required|string|max:20|unique:personas,cedula',
			'sexo' => 'required|in:M,F',
			'fecha_nacimiento' => 'required|date|before_or_equal:today',
			'estado_civil' => 'required|in:Soltero,Casado,Divorciado,Viudo',
			'direccion' => 'nullable|string|max:255',
			'telefono' => 'nullable|string|max:20',
			'correo' => 'nullable|email|max:100',
			'ingresos' => 'nullable|numeric|min:0',
			'carga_familiar' => 'required|integer|min:0',
			'tiene_carnet' => 'required|boolean',
		], [
			'nombres.required' => 'Los nombres son obligatorios.',
			'nombres.max' => 'Los nombres no deben exceder los 100 caracteres.',
			'nombres.regex' => 'Los nombres solo deben contener letras y espacios.',
			'apellidos.required' => 'Los apellidos son obligatorios.',
			'apellidos.max' => 'Los apellidos no deben exceder los 100 caracteres.',
			'apellidos.regex' => 'Los apellidos solo deben contener letras y espacios.',
			'cedula.required' => 'La cédula es obligatoria.',
			'cedula.max' => 'La cédula no debe exceder los 20 caracteres.',
			'cedula.unique' => 'Esta cédula ya está registrada.',
			'sexo.required' => 'El sexo es obligatorio.',
			'sexo.in' => 'El sexo seleccionado no es válido.',
			'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
			'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser futura.',
			'estado_civil.required' => 'El estado civil es obligatorio.',
			'estado_civil.in' => 'El estado civil seleccionado no es válido.',
			'direccion.max' => 'La dirección no debe exceder los 255 caracteres.',
			'telefono.max' => 'El teléfono no debe exceder los 20 caracteres.',
			'correo.email' => 'El correo electrónico debe ser válido.',
			'correo.max' => 'El correo no debe exceder los 100 caracteres.',
			'ingresos.numeric' => 'Los ingresos deben ser un valor numérico.',
			'ingresos.min' => 'Los ingresos no pueden ser negativos.',
			'carga_familiar.required' => 'La carga familiar es obligatoria.',
			'carga_familiar.integer' => 'La carga familiar debe ser un número entero.',
			'carga_familiar.min' => 'La carga familiar no puede ser negativa.',
			'tiene_carnet.required' => 'Debe indicar si tiene carnet de la patria.',
			'tiene_carnet.boolean' => 'El valor para carnet de la patria no es válido.',
		]);

		Persona::create([ 
			'nombres' => $this-> nombres,
			'apellidos' => $this-> apellidos,
			'cedula' => $this-> cedula,
			'sexo' => $this-> sexo,
			'fecha_nacimiento' => $this-> fecha_nacimiento,
			'estado_civil' => $this-> estado_civil,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'correo' => $this-> correo,
			'ingresos' => $this-> ingresos,
			'carga_familiar' => $this-> carga_familiar,
			'tiene_carnet' => $this-> tiene_carnet,
			'fecha_registro' => Carbon::now(),
			'estado' => 1
		]);
		
		//Registro de auditoria
		Auditoria::create([ 
			'usuario_id' => Auth::user()->id,
			'descripcion' => 'El usuario ha agregado a: '.$this-> nombres.' al registro',
		]);

		$this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Persona Successfully created.');
	}

	public function edit($id)
	{
		$record = Persona::findOrFail($id);
		$this->selected_id = $id; 
		$this->nombres = $record-> nombres;
		$this->apellidos = $record-> apellidos;
		$this->cedula = $record-> cedula;
		$this->sexo = $record-> sexo;
		$this->fecha_nacimiento = $record-> fecha_nacimiento;
		$this->estado_civil = $record-> estado_civil;
		$this->direccion = $record-> direccion;
		$this->telefono = $record-> telefono;
		$this->correo = $record-> correo;
		$this->ingresos = $record-> ingresos;
		$this->carga_familiar = $record-> carga_familiar;
		$this->tiene_carnet = $record-> tiene_carnet;
		$this->fecha_registro = $record-> fecha_registro;
		$this->estado = $record-> estado;
	}

	public function update()
	{
		$this->validate([
			'nombres' => 'required|string|max:100|regex:/^[\pL\s\-]+$/u',
			'apellidos' => 'required|string|max:100|regex:/^[\pL\s\-]+$/u',
			'cedula' => 'required|max:20|unique:personas,cedula,'.$this->selected_id,
			'sexo' => 'required|in:M,F',
			'fecha_nacimiento' => 'required|date|before_or_equal:today',
			'estado_civil' => 'required|in:Soltero,Casado,Divorciado,Viudo',
			'direccion' => 'nullable|string|max:255',
			'telefono' => 'nullable|string|max:20',
			'correo' => 'nullable|email|max:100',
			'ingresos' => 'nullable|numeric|min:0',
			'carga_familiar' => 'required|integer|min:0',
			'tiene_carnet' => 'required|boolean',
			'estado' => 'required|in:1,2,3'
		], [
			'nombres.required' => 'Los nombres son obligatorios.',
			'nombres.max' => 'Los nombres no deben exceder los 100 caracteres.',
			'nombres.regex' => 'Los nombres solo deben contener letras y espacios.',
			'apellidos.required' => 'Los apellidos son obligatorios.',
			'apellidos.max' => 'Los apellidos no deben exceder los 100 caracteres.',
			'apellidos.regex' => 'Los apellidos solo deben contener letras y espacios.',
			'cedula.required' => 'La cédula es obligatoria.',
			'cedula.max' => 'La cédula no debe exceder los 20 caracteres.',
			'cedula.unique' => 'Esta cédula ya está registrada.',
			'sexo.required' => 'El sexo es obligatorio.',
			'sexo.in' => 'El sexo seleccionado no es válido.',
			'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
			'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser futura.',
			'estado_civil.required' => 'El estado civil es obligatorio.',
			'estado_civil.in' => 'El estado civil seleccionado no es válido.',
			'direccion.max' => 'La dirección no debe exceder los 255 caracteres.',
			'telefono.max' => 'El teléfono no debe exceder los 20 caracteres.',
			'correo.email' => 'El correo electrónico debe ser válido.',
			'correo.max' => 'El correo no debe exceder los 100 caracteres.',
			'ingresos.numeric' => 'Los ingresos deben ser un valor numérico.',
			'ingresos.min' => 'Los ingresos no pueden ser negativos.',
			'carga_familiar.required' => 'La carga familiar es obligatoria.',
			'carga_familiar.integer' => 'La carga familiar debe ser un número entero.',
			'carga_familiar.min' => 'La carga familiar no puede ser negativa.',
			'tiene_carnet.required' => 'Debe indicar si tiene carnet de la patria.',
			'tiene_carnet.boolean' => 'El valor para carnet de la patria no es válido.',
			'estado.required' => 'El estado del registro es obligatorio.',
			'estado.in' => 'El estado seleccionado no es válido.'
		]);

		if ($this->selected_id) {
			$record = Persona::find($this->selected_id);
			$record->update([ 
				'nombres' => $this-> nombres,
				'apellidos' => $this-> apellidos,
				'cedula' => $this-> cedula,
				'sexo' => $this-> sexo,
				'fecha_nacimiento' => $this-> fecha_nacimiento,
				'estado_civil' => $this-> estado_civil,
				'direccion' => $this-> direccion,
				'telefono' => $this-> telefono,
				'correo' => $this-> correo,
				'ingresos' => $this-> ingresos,
				'carga_familiar' => $this-> carga_familiar,
				'tiene_carnet' => $this-> tiene_carnet,
				'estado' => $this-> estado
			]);

			//Registro de auditoria
			Auditoria::create([ 
				'usuario_id' => Auth::user()->id,
				'descripcion' => 'El usuario ha ediado la información de: '.$this-> nombres,
			]);

			$this->resetInput();
			$this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Persona Successfully updated.');
		}
	}

	public function destroy($id)
	{
		if ($id) {
			Persona::where('id', $id)->delete();
		}
	}
}