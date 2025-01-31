<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\StavkaNarudzbine;
use Illuminate\Database\Eloquent\Factories\Factory;

class StavkaNarudzbineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StavkaNarudzbine::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kolicina' => $this->faker->randomNumber(0),
            'proizvod_id' => \App\Models\Proizvod::factory(),
            'narudzbina_id' => \App\Models\Narudzbina::factory(),
        ];
    }
}
