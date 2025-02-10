<?php

namespace Database\Seeders;

use App\Models\TipKorisnika;
use DB;
use Illuminate\Database\Seeder;

class TipKorisnikaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tip_korisnikas')->insert([
            'naziv' => 'menadzer'
        ]);
        DB::table('tip_korisnikas')->insert([
            'naziv' => 'konobar'
        ]);
    }
}
