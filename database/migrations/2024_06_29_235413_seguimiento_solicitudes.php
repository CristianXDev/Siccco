<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::create('seguimiento_solicitudes', function (Blueprint $table){

            $table->id();
            $table->unsignedBigInteger('solicitud_id');
            $table->foreign('solicitud_id')->references('id')->on('solicitudes_mejoras');
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->date('fecha_seguimiento');
            $table->string('estado_anterior',50);
            $table->string('estado_nuevo',50);
            $table->text('observaciones');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });

    }

    public function down(): void{

        Schema::dropIfExists('seguimiento_solicitudes');
    }
};
