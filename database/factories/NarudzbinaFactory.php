<?php

namespace Database\Factories;

use App\Models\Narudzbina;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NarudzbinaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Narudzbina::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'sto_id' => \App\Models\Sto::factory(),
            'iznos' => $this->faker->randomNumber(1),
        ];
    }
}
