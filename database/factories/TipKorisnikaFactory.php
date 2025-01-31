<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TipKorisnika;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipKorisnikaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TipKorisnika::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'naziv' => $this->faker->text(255),
        ];
    }
}
