<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PersonaFactory extends Factory
{
    protected $model = Persona::class;

    public function definition()
    {
        return [
			'nombres' => $this->faker->name,
			'apellidos' => $this->faker->name,
			'cedula' => $this->faker->name,
			'sexo' => $this->faker->name,
			'fecha_nacimiento' => $this->faker->name,
			'estado_civil' => $this->faker->name,
			'direccion' => $this->faker->name,
			'telefono' => $this->faker->name,
			'correo' => $this->faker->name,
			'ingresos' => $this->faker->name,
			'carga_familiar' => $this->faker->name,
			'tiene_carnet' => $this->faker->name,
			'fecha_registro' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
