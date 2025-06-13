<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\TipKorisnika;
use App\Models\Narudzbina;
use App\Models\Racun;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatistikaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_statistika_index_returns_correct_view_and_data()
    {
        
        $tipKorisnika = TipKorisnika::factory()->create(['naziv' => 'konobar']);

        
        $user = User::factory()->create([
            'tip_korisnika_id' => $tipKorisnika->id
        ]);

     
        $this->actingAs($user);

       
        $narudzbina1 = Narudzbina::factory()->create(['iznos' => 2000]);
        $narudzbina2 = Narudzbina::factory()->create(['iznos' => 3000]);

        
        Racun::factory()->create([
            'narudzbina_id' => $narudzbina1->id,
            'vrsta_placanja' => 'kes',
        ]);

        Racun::factory()->create([
            'narudzbina_id' => $narudzbina2->id,
            'vrsta_placanja' => 'kartica',
        ]);

      
        $response = $this->get(route('statistika.index'));

        
        $response->assertViewIs('statistika.index');

       
        $response->assertViewHasAll([
            'kes' => 2000,
            'kartica' => 3000,
            'ukupnaZarada' => 5000,
        ]);

       
        $response->assertSeeText('2000'); 
        $response->assertSeeText('3000');
        $response->assertSeeText('5000');
    }
}
