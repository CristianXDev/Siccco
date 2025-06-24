<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Carnet;
use App\Models\Auditoria;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

class CarnetsReporte extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $persona_id, $tipos_beneficio_id, $personas, $tiposBeneficios, $estado;

	public function render()
	{
		$keyWord = '%'.$this->keyWord .'%';
		return view('livewire.carnets-reporte.view', [
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
}