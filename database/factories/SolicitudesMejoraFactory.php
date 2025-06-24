<?php

namespace Database\Factories;

use App\Models\SolicitudesMejora;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SolicitudesMejoraFactory extends Factory
{
    protected $model = SolicitudesMejora::class;

    public function definition()
    {
        return [
			'tipos_solicitud_id' => $this->faker->name,
			'persona_id' => $this->faker->name,
			'fecha_creacion' => $this->faker->name,
			'fecha_cierre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'observaciones' => $this->faker->name,
			'estado' => $this->faker->name,
			'responsable_id' => $this->faker->name,
			'comentarios_cierre' => $this->faker->name,
        ];
    }
}
