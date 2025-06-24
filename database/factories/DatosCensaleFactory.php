<?php

namespace Database\Factories;

use App\Models\DatosCensale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DatosCensaleFactory extends Factory
{
    protected $model = DatosCensale::class;

    public function definition()
    {
        return [
			'persona_id' => $this->faker->name,
			'nivel_educativo' => $this->faker->name,
			'ocupacion' => $this->faker->name,
			'discapacidad' => $this->faker->name,
			'tipo_discapacidad' => $this->faker->name,
			'seguro_medico' => $this->faker->name,
			'nombre_seguro' => $this->faker->name,
			'vive_desde' => $this->faker->name,
        ];
    }
}
