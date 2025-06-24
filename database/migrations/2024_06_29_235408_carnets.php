<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::create('carnets', function (Blueprint $table){

            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->integer('numero_carnet');
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento');
            $table->text('qr');
            $table->boolean('estado')->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });

    }

    public function down(): void{

        Schema::dropIfExists('carnets');
    }
};
