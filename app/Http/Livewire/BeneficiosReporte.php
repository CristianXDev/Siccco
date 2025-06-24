<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Beneficio;
use App\Models\TiposBeneficio;
use App\Models\Persona;
use App\Models\Auditoria;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

class BeneficiosReporte extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $persona_id, $tipos_beneficio_id, $fecha_entrega, $descripcion,$tiposBeneficios, $personas;

	public function render()
	{
		$keyWord = '%'.$this->keyWord .'%';

    // Subconsulta para obtener el ID del último beneficio por persona
		$subquery = Beneficio::selectRaw('MAX(id) as id')
		->groupBy('persona_id');

		return view('livewire.beneficios-reporte.view', [
			'beneficios' => Beneficio::with(['persona', 'tiposBeneficio'])
			->whereIn('id', $subquery)
			->where(function($query) use ($keyWord) {
				$query->whereHas('persona', function($q) use ($keyWord) {
					$q->where('nombres', 'LIKE', $keyWord)
					->orWhere('apellidos', 'LIKE', $keyWord);
				})
				->orWhere('fecha_entrega', 'LIKE', $keyWord)
				->orWhere('descripcion', 'LIKE', $keyWord);
			})
			->latest()
			->paginate(10),
		]);
	}
}