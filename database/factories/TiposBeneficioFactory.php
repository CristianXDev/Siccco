<?php

namespace Database\Factories;

use App\Models\TiposBeneficio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TiposBeneficioFactory extends Factory
{
    protected $model = TiposBeneficio::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
