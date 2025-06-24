<?php


/*======================
    DEPENDENCIAS
    =======================*/
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;


/*======================
    CONTROLADORES 
    =======================*/
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\LogoutController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\profileController;
    use App\Http\Controllers\PdfDownloadController;
    use App\Http\Controllers\BackupController;
    use App\Http\Controllers\EstadisticaController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*======================
      RUTAS SIMPLES
=======================*/

Route::get('/', function () {
    return view('home.index');
})->name('home');

/*======================
  RUTAS CON CONTROLADOR
  =======================*/

//LOGIN - [POST]
  Route::post('/login', [loginController::class, 'login'])->name('auth-login');

//LOGOUT - [POST]
  Route::get('/logout', [logoutController::class, 'logout'])->name('auth-logout');




/*======================
 RUTAS DESAUTENTIFICADAS
 =======================*/
 Route::middleware('guest')->group(function(){

    Route::get('/login', function () {
        return view('dashboard.auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('dashboard.auth.register');
    })->name('register');

});

/*======================
   RUTAS AUTENTIFICADAS
   =======================*/
   Route::middleware('auth')->group(function(){

    //DASHBOARD [GET]
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    Route::get('/dashboard', function () {
        return view('dashboard.home.index');
    })->name('dashboard');
    */

    //PROFILE [GET]
    Route::get('dashboard/profile', function () {
        return view('dashboard.profile.index');
    })->name('profile');

    //PROFILE UPDATE [POST]
    Route::post('dashboard/profile/update', [profileController::class, 'update'])->name('profile_update');

    //PROFILE UPDATE PHOTO [POST]
    Route::post('dashboard/profile/update/photo', [profileController::class, 'update_photo'])->name('profile_photo');

    //PROFILE UPDATE PASSWORD [POST]
    Route::post('dashboard/profile/update/password', [profileController::class, 'update_password'])->name('profile_update_password');

    //AUDITORIA
    Route::group(['prefix' => 'dashboard/auditorias'], function () {
        Route::get('/', function () {
            return view('livewire.auditorias.index');
        })
        ->name('auditorias');
    });

    //GESTION DE USUARIOS 
    Route::group(['prefix' => 'dashboard/gestion/usuarios'], function () {
        Route::get('/', function () {
            return view('livewire.users.index');
        })
        ->name('usuarios');
    });

    //TIPO DE BENEFICIO
    Route::group(['prefix' => 'dashboard/tipo/beneficio'], function () {
        Route::get('/', function () {
            return view('livewire.tipos-beneficios.index');
        })
        ->name('tipos-beneficios');
    });

    //PERSONAS
    Route::group(['prefix' => 'dashboard/personas'], function () {
        Route::get('/', function () {
            return view('livewire.personas.index');
        })
        ->name('personas');
    });

    //BENEFICIOS
    Route::group(['prefix' => 'dashboard/beneficios'], function () {
        Route::get('/', function () {
            return view('livewire.beneficios.index');
        })
        ->name('beneficios');
    });

    //BENEFICIOS - REPORTE
    Route::group(['prefix' => 'dashboard/beneficios/reporte'], function () {
        Route::get('/', function () {
            return view('livewire.beneficios-reporte.index');
        })
        ->name('beneficios-reporte');
    });

    //BENEFICIOS - REPORTE (DOWNLOAD)
    Route::get('/dashboard/beneficios/reporte/download/{id}', [PdfDownloadController::class, 'beneficio_reporte'])->name('beneficios-reporte-download');

    //BACKUP
    Route::get('/dashboard/backup', function () {
        return view('dashboard.backup.index');
    })->name('backup');

    //BACKUP - CREAR
    Route::get('/backup/create', [BackupController::class, 'createBackup'])->name('backup-create');

    //BACKUP - RESTAURAR
    Route::get('/backup/update', [BackupController::class, 'updateBackup'])->name('backup-update');

    //DATOS CENSALES
    Route::get('/dashboard/datos/censales', function () {
        return view('livewire.datos-censales.index');
    })->name('datos-censales');

    //CARNETS
    Route::get('/dashboard/carnets', function () {
        return view('livewire.carnets.index');
    })->name('carnets');

    //CARNETS
    Route::get('/dashboard/historial/carnets', function () {
        return view('livewire.historial-carnets.index');
    })->name('historial-carnets');

    //CARNETS REPORTES
    Route::get('/dashboard/carnets/reporte', function () {
        return view('livewire.carnets-reporte.index');
    })->name('carnets-reporte');

    //BENEFICIOS - REPORTE (DOWNLOAD)
    Route::get('/dashboard/carnets/reporte/download/{id}', [PdfDownloadController::class, 'carnets_reporte'])->name('carnets-reporte-download');

    //TIPO SOLICITUD
    Route::group(['prefix' => 'dashboard/tipo/solicitud'], function () {
        Route::get('/', function () {
            return view('livewire.tipos-solicituds.index');
        })
        ->name('tipo-solicitud');
    });

    //SOLICITUD MEJORAS
    Route::group(['prefix' => 'dashboard/solicitud/mejoras'], function () {
        Route::get('/', function () {
            return view('livewire.solicitudes-mejoras.index');
        })
        ->name('solicitud-mejoras');
    });

    //ESTADISTICAS - [gET]
    Route::get('/dashboard/estadisticas', [estadisticaController::class, 'index'])->name('estadisticas');


});

/*======================
    RUTA DE ERRORES
    =======================*/

//ERROR 404
    Route::fallback(function () {
        return view('errors.pageNoFound');
    });