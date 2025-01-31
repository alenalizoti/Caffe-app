<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StavkaNarudzbine;

class StavkaNarudzbineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StavkaNarudzbine::factory()
            ->count(5)
            ->create();
    }
}
