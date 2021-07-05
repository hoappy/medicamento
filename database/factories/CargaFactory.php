<?php

namespace Database\Factories;

use App\Models\Carga;
use App\Models\Medicamento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CargaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Carga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'medicamento_id' => Medicamento::all()->random()->id,
            'fecha_carga' => Carbon::now(),
        ];
    }
}
