<?php

namespace Database\Factories;

use App\Models\Kategorija;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class KategorijaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kategorija::class;

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
