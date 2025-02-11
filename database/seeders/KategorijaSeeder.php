<?php

namespace Database\Seeders;

use App\Models\Kategorija;
use DB;
use Illuminate\Database\Seeder;

class KategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategorijas')->insert([
            'naziv' => 'Tople kafe'
        ]);
        DB::table('kategorijas')->insert([
            'naziv' => 'Hladne kafe'
        ]);
        DB::table('kategorijas')->insert([
            'naziv' => 'Sokovi'
        ]);
    }
}
