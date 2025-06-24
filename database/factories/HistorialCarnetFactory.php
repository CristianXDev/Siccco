<?php

namespace Database\Factories;

use App\Models\HistorialCarnet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HistorialCarnetFactory extends Factory
{
    protected $model = HistorialCarnet::class;

    public function definition()
    {
        return [
			'persona_id' => $this->faker->name,
			'carnet_id' => $this->faker->name,
			'fecha_cambio' => $this->faker->name,
			'nivel_educativo' => $this->faker->name,
			'observaciones' => $this->faker->name,
        ];
    }
}
