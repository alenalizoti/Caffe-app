<?php

namespace Database\Seeders;

use App\Models\TipKorisnika;
use Illuminate\Database\Seeder;

class TipKorisnikaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipKorisnika::factory()
            ->count(5)
            ->create();
    }
}
