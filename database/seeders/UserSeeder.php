<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('petar123'),
            'tip_korisnika_id' => 1,
            'plata' => 85000.00
        ]);
        DB::table('users')->insert([
            'ime' => 'Ana',
            'prezime' => 'Joviv',
            'username' => 'ajovic',
            'password' => Hash::make('ajovic123'),
            'tip_korisnika_id' => 1,
            'plata' => 78000.00
        ]);
        DB::table('users')->insert([
            'ime' => 'Mika',
            'prezime' => 'Mikic',
            'username' => 'mmikic',
            'password' => Hash::make('mika123'),
            'tip_korisnika_id' => 2,
            'plata' => 45000.00
        ]);
        DB::table('users')->insert([
            'ime' => 'Ivana',
            'prezime' => 'Kostic',
            'username' => 'jkostic',
            'password' => Hash::make('jkostic123'),
            'tip_korisnika_id' => 2,
            'plata' => 56000.00
        ]);
    }
}
