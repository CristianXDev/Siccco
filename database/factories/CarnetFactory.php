<?php

namespace Database\Factories;

use App\Models\Carnet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarnetFactory extends Factory
{
    protected $model = Carnet::class;

    public function definition()
    {
        return [
			'persona_id' => $this->faker->name,
			'tipos_beneficio_id' => $this->faker->name,
			'numero_carnet' => $this->faker->name,
			'fecha_emision' => $this->faker->name,
			'fecha_vencimiento' => $this->faker->name,
			'qr' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
