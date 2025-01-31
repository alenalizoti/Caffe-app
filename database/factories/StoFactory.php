<?php

namespace Database\Factories;

use App\Models\Sto;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sto::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'broj_stola' => $this->faker->randomNumber(0),
            'status' => $this->faker->word(),
        ];
    }
}
