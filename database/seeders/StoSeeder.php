<?php

namespace Database\Seeders;

use App\Models\Sto;
use DB;
use Illuminate\Database\Seeder;

class StoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stos')->insert([
            'broj_stola' => 22,
        ]);
        DB::table('stos')->insert([
            'broj_stola' => 23,
        ]);
        DB::table('stos')->insert([
            'broj_stola' => 24,
        ]);
        DB::table('stos')->insert([
            'broj_stola' => 25,
        ]);
        DB::table('stos')->insert([
            'broj_stola' => 26,
        ]);
        DB::table('stos')->insert([
            'broj_stola' => 27,
        ]);
        DB::table('stos')->insert([
            'broj_stola' => 28,
        ]);
        DB::table('stos')->insert([
            'broj_stola' => 29,
        ]);
        DB::table('stos')->insert([
            'broj_stola' => 30,
        ]);
        DB::table('stos')->insert([
            'broj_stola' => 31,
        ]);
        DB::table('stos')->insert([
            'broj_stola' => 32,
        ]);
        DB::table('stos')->insert([
            'broj_stola' => 33,
        ]);
    }
}
