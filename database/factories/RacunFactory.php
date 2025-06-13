<?php

namespace Database\Factories;

use App\Models\Narudzbina;
use App\Models\Racun;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RacunFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Racun::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'narudzbina_id' => Narudzbina::factory(),
            'vrsta_placanja' => $this->faker->text(255),
        ];
    }
}
