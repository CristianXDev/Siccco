<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::create('beneficio', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->unsignedBigInteger('tipos_beneficio_id');
            $table->foreign('tipos_beneficio_id')->references('id')->on('tipos_beneficio');
            $table->date('fecha_entrega');
            $table->text('descripcion');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    public function down(): void{

        Schema::dropIfExists('beneficio');
    }
};
