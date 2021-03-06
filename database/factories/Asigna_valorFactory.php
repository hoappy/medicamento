<?php

namespace Database\Factories;

use App\Models\Asigna_valor;
use App\Models\Medicamento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class Asigna_valorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asigna_valor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'medicamento_id' => Medicamento::all()->where('estado', '=', '1')->random()->id,
            'valor' => $this->faker->randomNumber(),
            'fecha_asigna' => Carbon::now(),
            'cantidad' => $this->faker->randomNumber(),
        ];
    }
}
