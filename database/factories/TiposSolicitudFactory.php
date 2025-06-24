<?php

namespace Database\Factories;

use App\Models\TiposSolicitud;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TiposSolicitudFactory extends Factory
{
    protected $model = TiposSolicitud::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'prioridad' => $this->faker->name,
        ];
    }
}
