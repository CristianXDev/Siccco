<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\HistorialCarnet;
use App\Models\Beneficio;
use App\Models\TiposBeneficio;

class estadisticaController extends Controller
{
    public function index()
    {
        // Censo de personas
        $hombres = Persona::where('sexo', 'H')->count();
        $mujeres = Persona::where('sexo', 'M')->count();

        // Estadísticas de carnets por estatus
        $estatusCarnets = HistorialCarnet::selectRaw('nivel_educativo, count(*) as total')
            ->groupBy('nivel_educativo')
            ->pluck('total', 'nivel_educativo')
            ->toArray();

        // Top 5 beneficios más usados
        $topBeneficios = Beneficio::selectRaw('tipos_beneficio_id, count(*) as total')
            ->with('tipoBeneficio') // Cargar la relación
            ->groupBy('tipos_beneficio_id')
            ->orderByDesc('total')
            ->limit(5)
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->tipoBeneficio->nombre => $item->total];
            })
            ->toArray();

        return view('dashboard.estadisticas.index', compact(
            'hombres',
            'mujeres',
            'estatusCarnets',
            'topBeneficios'
        ));
    }
}