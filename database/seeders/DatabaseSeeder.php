<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        

        $this->call(KategorijaSeeder::class);
        $this->call(NarudzbinaSeeder::class);
        $this->call(ProizvodSeeder::class);
        $this->call(RacunSeeder::class);
        $this->call(StavkaNarudzbineSeeder::class);
        $this->call(StoSeeder::class);
        $this->call(TipKorisnikaSeeder::class);
        $this->call(UserSeeder::class);
    }
}
