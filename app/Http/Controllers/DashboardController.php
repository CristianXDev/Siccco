<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Persona;
use App\Models\DatosCensale;
use App\Models\Beneficio;

class DashboardController extends Controller
{
    public function index(){
        
        // Obtener el conteo de registros para cada modelo
        $totalUsers = User::count();
        $totalPersonas = Persona::count();
        $totalDatosCensales = DatosCensale::count();
        $totalBeneficios = Beneficio::count();
        
        // Pasar los datos a la vista
        return view('dashboard.home.index', compact(
            'totalUsers',
            'totalPersonas',
            'totalDatosCensales',
            'totalBeneficios'
        ));
    }
}