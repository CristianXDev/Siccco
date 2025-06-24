<?php

namespace Database\Factories;

use App\Models\Beneficio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BeneficioFactory extends Factory
{
    protected $model = Beneficio::class;

    public function definition()
    {
        return [
			'persona_id' => $this->faker->name,
			'tipos_beneficio_id' => $this->faker->name,
			'fecha_entrega' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
