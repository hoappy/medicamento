<?php

namespace Database\Factories;

use App\Models\Medicamento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MedicamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medicamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'nombre_medicamento' => $this->faker->unique()->word(50),
            'descripcion_medicamento' => $this->faker->word(50),
            'estado' => $this->faker->randomElement(['1']),
            'estadoo' => $this->faker->randomElement(['0','1']),
        ];
    }
}
