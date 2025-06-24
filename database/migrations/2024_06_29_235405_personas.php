<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::create('personas', function (Blueprint $table) {
            $table->id(); // Corresponde a 'id' (autoincremental)
            $table->string('nombres', 100); // varchar(100)
            $table->string('apellidos', 100); // varchar(100)
            $table->integer('cedula'); // varchar(20)
            $table->enum('sexo', ['M', 'F']); // enum('M', 'F', 'Otro') - Nota: Corregí 'W' por 'M'
            $table->date('fecha_nacimiento'); // date
            $table->enum('estado_civil', ['Soltero', 'Casado', 'Divorciado', 'Viudo']); // enum
            $table->string('direccion', 255)->nullable(); // varchar(255) - nullable
            $table->string('telefono', 15)->nullable(); // varchar(15) - nullable
            $table->string('correo', 100)->nullable(); // varchar(100) - nullable
            $table->decimal('ingresos', 10, 2)->nullable(); // decimal(10,2) - nullable
            $table->integer('carga_familiar')->default(0); // int(11) - default 0
            $table->boolean('tiene_carnet')->default(false); // tinyint(1) - default 0
            $table->timestamp('fecha_registro')->useCurrent(); // timestamp - default current_timestamp
            $table->boolean('estado')->default(true); // tinyint(1) - default 1
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });

    }

    public function down(): void{

        Schema::dropIfExists('personas');
    }
};
