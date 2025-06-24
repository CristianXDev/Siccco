<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('foto')->nullable();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('cedula');
            $table->string('correo')->unique();
            $table->string('password');
            $table->enum('estatus', ['activo', 'inactivo', 'pendiente']);
            $table->enum('rol', [1,2]);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            #$table->timestamps();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });

        // Insertar usuarios por defecto
        DB::table('users')->insert([
            [
                'nombre' => 'Cristian',
                'apellido' => 'Gerig',
                'cedula' => '31317165',
                'correo' => 'chriscodetech@gmail.com',
                'estatus' => 'activo',
                'password' => bcrypt('31317165'), // Cifrar la contraseña
                'rol' => 1, // Rol del usuario
            ],
            [
                'nombre' => 'Lucia',
                'apellido' => 'Salcedo',
                'cedula' => '29436712',
                'correo' => 'luciarondon05@gmail.com',
                'estatus' => 'activo',
                'password' => bcrypt('12345678'),
                'rol' => 2,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
