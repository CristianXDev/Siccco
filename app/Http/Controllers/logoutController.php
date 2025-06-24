<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class logoutController extends Controller{

    public function logout(Request $request){

            //Hacer que fluya el ciclo de sesiones
            Session::flush();

            //Cerrar sesion activa
            Auth::logout();

            //Redirigir al inicio
            return redirect()->route('auth-login');
    }
}
