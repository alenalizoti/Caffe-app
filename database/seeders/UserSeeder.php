<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'ime' => 'Petar',
            'prezime' => 'Peric',
            'username' => 'pperic',
            'password' => 'petar123',
            'tip_korisnika_id' => 3,
            'plata' => 85000.00
        ]);
        DB::table('users')->insert([
            'ime' => 'Ana',
            'prezime' => 'Joviv',
            'username' => 'ajovic',
            'password' => 'ajovic123',
            'tip_korisnika_id' => 3,
            'plata' => 78000.00
        ]);
        DB::table('users')->insert([
            'ime' => 'Mika',
            'prezime' => 'Mikic',
            'username' => 'mmikic',
            'password' => 'mika123',
            'tip_korisnika_id' => 4,
            'plata' => 45000.00
        ]);
        DB::table('users')->insert([
            'ime' => 'Ivana',
            'prezime' => 'Kostic',
            'username' => 'jkostic',
            'password' => 'jkostic123',
            'tip_korisnika_id' => 4,
            'plata' => 56000.00
        ]);
    }
}
