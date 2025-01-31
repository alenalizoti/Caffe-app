<?php

namespace Database\Factories;

use App\Models\Proizvod;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProizvodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proizvod::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'naziv' => $this->faker->text(255),
            'opis' => $this->faker->text(),
            'cena' => $this->faker->randomNumber(1),
            'image' => $this->faker->text(255),
            'kategorija_id' => \App\Models\Kategorija::factory(),
        ];
    }
}
