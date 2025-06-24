<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::create('tipos_solicitud', function (Blueprint $table){
            $table->id();
            $table->string('nombre',100);
            $table->text('descripcion');
            $table->enum('prioridad', [
                'Baja',
                'Media', 
                'Alta'
            ])->default('Baja'); // enum con valor por defecto
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });

    }

    public function down(): void{

        Schema::dropIfExists('tipos_solicitud');
    }
};
