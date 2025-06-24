<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DatosCensale;
use App\Models\Persona;
use App\Models\Auditoria;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

class DatosCensales extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $persona_id, $nivel_educativo, $ocupacion, $discapacidad, $tipo_discapacidad, $seguro_medico, $nombre_seguro, $vive_desde, $personas;

	public function render()
	{
		$keyWord = '%'.$this->keyWord .'%';
		return view('livewire.datos-censales.view', [
			'datosCensales' => DatosCensale::latest()
			->orWhere('persona_id', 'LIKE', $keyWord)
			->orWhere('nivel_educativo', 'LIKE', $keyWord)
			->orWhere('ocupacion', 'LIKE', $keyWord)
			->orWhere('discapacidad', 'LIKE', $keyWord)
			->orWhere('tipo_discapacidad', 'LIKE', $keyWord)
			->orWhere('seguro_medico', 'LIKE', $keyWord)
			->orWhere('nombre_seguro', 'LIKE', $keyWord)
			->orWhere('vive_desde', 'LIKE', $keyWord)
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
		$this->nivel_educativo = null;
		$this->ocupacion = null;
		$this->discapacidad = null;
		$this->tipo_discapacidad = null;
		$this->seguro_medico = null;
		$this->nombre_seguro = null;
		$this->vive_desde = null;
	}




	public function store()
	{
		$this->validate([
		 	'persona_id' => 'required|unique:datos_censales,persona_id',
			'nivel_educativo' => 'required|in:Ninguno,Primaria,Secundaria,Técnico,Universitario',
			'ocupacion' => 'required|string|max:100',
			'discapacidad' => 'required|boolean',
			'tipo_discapacidad' => [
				'nullable',
				'string',
				'max:100',
				'required_if:discapacidad,1',
				function ($attribute, $value, $fail) {
					if (!$this->discapacidad && !empty($value)) {
						$fail('No debe ingresar tipo de discapacidad si marcó que no tiene discapacidad.');
					}
				}
			],
			'seguro_medico' => 'required|boolean',
			'nombre_seguro' => [
				'nullable',
				'string',
				'max:100',
				'required_if:seguro_medico,1',
				function ($attribute, $value, $fail) {
					if (!$this->seguro_medico && !empty($value)) {
						$fail('No debe ingresar nombre de seguro si marcó que no tiene seguro médico.');
					}
				}
			],
			'vive_desde' => 'required|date|before_or_equal:today'
		], [
			'persona_id.required' => 'La persona es obligatoria.',
			'persona_id.unique' => 'Esta persona ya tiene datos censales registrados.', 
			'persona_id.exists' => 'La persona seleccionada no existe.',
			'nivel_educativo.required' => 'El nivel educativo es obligatorio.',
			'nivel_educativo.in' => 'El nivel educativo seleccionado no es válido.',
			'ocupacion.required' => 'La ocupación es obligatoria.',
			'ocupacion.max' => 'La ocupación no debe exceder los 100 caracteres.',
			'discapacidad.required' => 'Debe indicar si tiene discapacidad.',
			'discapacidad.boolean' => 'El valor para discapacidad no es válido.',
			'tipo_discapacidad.required_if' => 'Debe especificar el tipo de discapacidad cuando selecciona que tiene discapacidad.',
			'tipo_discapacidad.max' => 'El tipo de discapacidad no debe exceder los 100 caracteres.',
			'seguro_medico.required' => 'Debe indicar si tiene seguro médico.',
			'seguro_medico.boolean' => 'El valor para seguro médico no es válido.',
			'nombre_seguro.required_if' => 'Debe especificar el nombre del seguro cuando selecciona que tiene seguro médico.',
			'nombre_seguro.max' => 'El nombre del seguro no debe exceder los 100 caracteres.',
			'vive_desde.required' => 'La fecha "Vive desde" es obligatoria.',
			'vive_desde.date' => 'La fecha "Vive desde" debe ser una fecha válida.',
			'vive_desde.before_or_equal' => 'La fecha "Vive desde" no puede ser futura.'
		]);

    // Asegurar nulos cuando no corresponda
		$tipoDiscapacidad = $this->discapacidad ? $this->tipo_discapacidad : null;
		$nombreSeguro = $this->seguro_medico ? $this->nombre_seguro : null;

		DatosCensale::create([ 
			'persona_id' => $this->persona_id,
			'nivel_educativo' => $this->nivel_educativo,
			'ocupacion' => $this->ocupacion,
			'discapacidad' => $this->discapacidad,
			'tipo_discapacidad' => $tipoDiscapacidad,
			'seguro_medico' => $this->seguro_medico,
			'nombre_seguro' => $nombreSeguro,
			'vive_desde' => $this->vive_desde
		]);

		//Registro de auditoria
		Auditoria::create([ 
			'usuario_id' => Auth::user()->id,
			'descripcion' => 'El usuario ha censado una persona',
		]);

		$this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Datos censales creados exitosamente.');
	}

	public function update()
	{
		$this->validate([
			'persona_id' => 'required|exists:personas,id',
			'nivel_educativo' => 'required|in:Ninguno,Primaria,Secundaria,Técnico,Universitario',
			'ocupacion' => 'required|string|max:100',
			'discapacidad' => 'required|boolean',
			'tipo_discapacidad' => [
				'nullable',
				'string',
				'max:100',
				'required_if:discapacidad,1',
				function ($attribute, $value, $fail) {
					if (!$this->discapacidad && !empty($value)) {
						$fail('No debe ingresar tipo de discapacidad si marcó que no tiene discapacidad.');
					}
				}
			],
			'seguro_medico' => 'required|boolean',
			'nombre_seguro' => [
				'nullable',
				'string',
				'max:100',
				'required_if:seguro_medico,1',
				function ($attribute, $value, $fail) {
					if (!$this->seguro_medico && !empty($value)) {
						$fail('No debe ingresar nombre de seguro si marcó que no tiene seguro médico.');
					}
				}
			],
			'vive_desde' => 'required|date|before_or_equal:today'
		], [
			'persona_id.required' => 'La persona es obligatoria.',
			'persona_id.exists' => 'La persona seleccionada no existe.',
			'nivel_educativo.required' => 'El nivel educativo es obligatorio.',
			'nivel_educativo.in' => 'El nivel educativo seleccionado no es válido.',
			'ocupacion.required' => 'La ocupación es obligatoria.',
			'ocupacion.max' => 'La ocupación no debe exceder los 100 caracteres.',
			'discapacidad.required' => 'Debe indicar si tiene discapacidad.',
			'discapacidad.boolean' => 'El valor para discapacidad no es válido.',
			'tipo_discapacidad.required_if' => 'Debe especificar el tipo de discapacidad cuando selecciona que tiene discapacidad.',
			'tipo_discapacidad.max' => 'El tipo de discapacidad no debe exceder los 100 caracteres.',
			'seguro_medico.required' => 'Debe indicar si tiene seguro médico.',
			'seguro_medico.boolean' => 'El valor para seguro médico no es válido.',
			'nombre_seguro.required_if' => 'Debe especificar el nombre del seguro cuando selecciona que tiene seguro médico.',
			'nombre_seguro.max' => 'El nombre del seguro no debe exceder los 100 caracteres.',
			'vive_desde.required' => 'La fecha "Vive desde" es obligatoria.',
			'vive_desde.date' => 'La fecha "Vive desde" debe ser una fecha válida.',
			'vive_desde.before_or_equal' => 'La fecha "Vive desde" no puede ser futura.'
		]);

		if ($this->selected_id) {
        // Asegurar nulos cuando no corresponda
			$tipoDiscapacidad = $this->discapacidad ? $this->tipo_discapacidad : null;
			$nombreSeguro = $this->seguro_medico ? $this->nombre_seguro : null;

			$record = DatosCensale::find($this->selected_id);
			$record->update([ 
				'persona_id' => $this->persona_id,
				'nivel_educativo' => $this->nivel_educativo,
				'ocupacion' => $this->ocupacion,
				'discapacidad' => $this->discapacidad,
				'tipo_discapacidad' => $tipoDiscapacidad,
				'seguro_medico' => $this->seguro_medico,
				'nombre_seguro' => $nombreSeguro,
				'vive_desde' => $this->vive_desde
			]);

			//Registro de auditoria
			Auditoria::create([ 
				'usuario_id' => Auth::user()->id,
				'descripcion' => 'El usuario ha editado los datos censales de una persona',
			]);

			$this->resetInput();
			$this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Datos censales actualizados exitosamente.');
		}
	}


	public function edit($id)
	{
		$record = DatosCensale::findOrFail($id);
		$this->selected_id = $id; 
		$this->persona_id = $record-> persona_id;
		$this->nivel_educativo = $record-> nivel_educativo;
		$this->ocupacion = $record-> ocupacion;
		$this->discapacidad = $record-> discapacidad;
		$this->tipo_discapacidad = $record-> tipo_discapacidad;
		$this->seguro_medico = $record-> seguro_medico;
		$this->nombre_seguro = $record-> nombre_seguro;
		$this->vive_desde = $record-> vive_desde;
	}

	public function destroy($id)
	{
		if ($id) {
			DatosCensale::where('id', $id)->delete();
		}
	}
	public function mount(){
		$this->personas = Persona::where('estado',1)->get();
	}
}