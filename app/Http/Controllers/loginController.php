<?php

namespace App\Http\Controllers;

//MODELO
use App\Models\User;

//COMPLEMENTOS
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

//CLASE PRINCIPAL
class LoginController extends Controller{

    //FUCNIÓN [LOGIN]
    public function login(Request $request){

        // 1. Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'correo' => 'required|email|exists:users,correo',  // Usamos exists aquí
            'contrasena' => 'required',
        ]);

      // 2. Si la validación falla, redirigir con los errores
      if ($validator->fails()) {

        return redirect()->back()->withErrors($validator)->withInput(); // Devuelve todos los valores anteriores
      }

      //3. Busca al usuario por correo electrónico
      $user = User::where('correo', $request->correo)->first();

      //4. Verifica si el usuario existe y si la contraseña es correcta
      if ($user && Hash::check($request->contrasena, $user->password)){

        //4.1 Iniciar sesión al usuario
        Auth::login($user);

        //4.2 Redireccionar al usuario a la página de inicio o a la ruta deseada
        return redirect()->route('dashboard');

    } else {

        //4.3 Mostrar un mensaje de error si las credenciales son incorrectas
        return back()->withErrors(['correo' => 'Credenciales inválidas.']);

        }
    }

    //FUNCIÓN [LOGOUT]
    public function logout(Request $request){

    //1. Verificar si existe la variable 'logout' en el request
      if(isset($request['logout'])){

      //1.2. Hacer que fluya el ciclo de sesiones
      Session::flush();

      //1.3. Cerrar sesion activa
      Auth::logout();

      //1.4. Redirigir al inicio
      return redirect()->route('login');

   } else{ 

        //1.5 Redirigir al inicio
        return redirect()->route('dashboard');

        }
    }
}