<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\TipKorisnika;
use App\Models\Narudzbina;
use App\Models\Racun;
use App\Models\Proizvod;
use App\Models\StavkaNarudzbine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KaficUnitTest extends TestCase
{
    use RefreshDatabase;

    public function test_statistika_index_returns_zero_when_no_data()
    {
       
        $user = User::factory()->create();
        $this->actingAs($user);

       
        $response = $this->get(route('statistika.index'));

       
        $response->assertViewHasAll([
            'kes' => 0,
            'kartica' => 0,
            'ukupnaZarada' => 0,
            'kesProcenat' => 0,
            'karticaProcenat' => 0,
        ]);

       
        $response->assertSeeText('0');
    }

    public function test_statistika_index_calculates_payment_percentages_correctly()
    {
       
        $user = User::factory()->create();
        $this->actingAs($user);

       
        $narudzbina1 = Narudzbina::factory()->create(['iznos' => 1000]);
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

      
        
        $response->assertViewHasAll([
            'kes' => 1000,
            'kartica' => 3000,
            'ukupnaZarada' => 4000,
            'kesProcenat' => (1000 / 4000) * 100,
            'karticaProcenat' => (3000 / 4000) * 100,
        ]);

        
        $response->assertSeeText('1000');
        $response->assertSeeText('3000');
        $response->assertSeeText('25');
        $response->assertSeeText('75');
    }

    public function test_statistika_displays_top_selling_items()
    {
        
        $user = User::factory()->create();
        $this->actingAs($user);

       
        $proizvod1 = Proizvod::factory()->create(['naziv' => 'Espresso']);
        $proizvod2 = Proizvod::factory()->create(['naziv' => 'Cappuccino']);
        $proizvod3 = Proizvod::factory()->create(['naziv' => 'Latte']);

       
        StavkaNarudzbine::factory()->create(['proizvod_id' => $proizvod1->id, 'kolicina' => 10]);
        StavkaNarudzbine::factory()->create(['proizvod_id' => $proizvod2->id, 'kolicina' => 20]);
        StavkaNarudzbine::factory()->create(['proizvod_id' => $proizvod3->id, 'kolicina' => 15]);

        $response = $this->get(route('statistika.index'));

        
        $response->assertSeeInOrder(['Cappuccino', 'Latte', 'Espresso']);
    }
}
