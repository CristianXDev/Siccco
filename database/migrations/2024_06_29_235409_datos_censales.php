<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::create('datos_censales', function (Blueprint $table){
            $table->id(); // id (autoincremental)
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->enum('nivel_educativo', [
                'Ninguno',
                'Primaria', 
                'Secundaria',
                'Técnico',
                'Universitario',
                'Postgrado'
            ])->default('Ninguno'); // enum con valor por defecto
            $table->string('ocupacion', 100)->nullable(); // varchar(100)
            $table->boolean('discapacidad')->default(false); // tinyint(1)
            $table->string('tipo_discapacidad', 100)->nullable(); // varchar(100)
            $table->boolean('seguro_medico')->default(false); // tinyint(1)
            $table->string('nombre_seguro', 100)->nullable(); // varchar(100)
            $table->date('vive_desde')->nullable(); // date
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });

    }

    public function down(): void{

        Schema::dropIfExists('datos_censales');
    }
};
