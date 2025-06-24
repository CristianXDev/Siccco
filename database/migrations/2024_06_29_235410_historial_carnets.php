<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::create('historial_carnets', function (Blueprint $table){
            $table->id(); // id (autoincremental)
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
             $table->text('codigo_carnet')->nullable();
             $table->date('fecha_cambio')->nullable();
             $table->enum('nivel_educativo', [
                'Ninguno',
                'Emision', 
                'Renovacion',
                'Perdida',
                'Suspension',
                'Reactivacion'
            ])->default('Ninguno'); // enum con valor por defecto
            $table->text('observaciones')->nullable(); // varchar(100)
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });

    }

    public function down(): void{

        Schema::dropIfExists('historial_carnets');
    }
};
