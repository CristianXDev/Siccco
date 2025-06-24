<?php

namespace App\Http\Controllers;

//Componentes
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

//Modelos
use App\Models\Persona;
use App\Models\Beneficio;
use App\Models\Carnet;


//Qr
#use BaconQrCode\Renderer\GDLibRenderer;
#use BaconQrCode\Writer;


    class PdfDownloadController extends Controller{

        public function beneficio_reporte($id){

            //Informaciónde la persona
            $persona = Persona::find($id);

            $beneficios = Beneficio::where('persona_id',$persona->id)->get();

            return \PDF::loadView('pdf.beneficio-reporte',
                compact('persona','beneficios'))
            ->setPaper('a4', 'landscape')
            ->download('certificado.pdf');
    }


        public function carnets_reporte($id){

            //Informaciónde la persona
            $carnet = Carnet::find($id);

            return \PDF::loadView('pdf.carnets-reporte',
                compact('carnet'))
            ->setPaper('a4', 'landscape')
            ->download('carnet.pdf');
    }
}
