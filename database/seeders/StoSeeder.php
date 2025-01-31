<?php

namespace Database\Seeders;

use App\Models\Sto;
use Illuminate\Database\Seeder;

class StoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sto::factory()
            ->count(5)
            ->create();
    }
}
