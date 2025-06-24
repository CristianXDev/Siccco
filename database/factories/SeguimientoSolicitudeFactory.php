<?php

namespace Database\Factories;

use App\Models\SeguimientoSolicitude;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SeguimientoSolicitudeFactory extends Factory
{
    protected $model = SeguimientoSolicitude::class;

    public function definition()
    {
        return [
			'solicitud_id' => $this->faker->name,
			'persona_id' => $this->faker->name,
			'fecha_seguimiento' => $this->faker->name,
			'estado_anterior' => $this->faker->name,
			'estado_nuevo' => $this->faker->name,
			'observaciones' => $this->faker->name,
        ];
    }
}
