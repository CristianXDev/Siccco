<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::create('solicitudes_mejoras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipos_solicitud_id');
            $table->foreign('tipos_solicitud_id')->references('id')->on('tipos_solicitud');
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->date('fecha_creacion');
            $table->date('fecha_cierre')->nullable();  // ← nullable si es opcional
            $table->text('descripcion');
            $table->text('observaciones');
            $table->enum('estado', ['Recibida', 'En revision', 'Aprobada', 'Rechazada', 'Completada'])->default('En revision');
            $table->unsignedBigInteger('responsable_id');
            $table->foreign('responsable_id')->references('id')->on('users');
            $table->text('comentarios_cierre')->nullable();  // ← nullable si es opcional
            $table->timestamps();  // ← Alternativa más limpia para created_at/updated_at
        });

    }

    public function down(): void{

        Schema::dropIfExists('solicitudes_mejoras');
    }
};
