<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Narudzbina;
use App\Models\Racun;
use App\Models\Sto;
use App\Models\TipKorisnika;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RacunsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_racun_store_creates_racun_and_updates_sto_status()
    {
        
        $tipKorisnika = TipKorisnika::factory()->create(['naziv' => 'konobar']);

     
        $user = User::factory()->create([
            'tip_korisnika_id' => $tipKorisnika->id
        ]);

      
        $this->actingAs($user);

       
        $sto = Sto::factory()->create([
            'status' => 'Zauzet',
            'broj_stola' => 55
        ]);

     
        $narudzbina = Narudzbina::factory()->create([
            'sto_id' => $sto->id,
            'iznos' => 1500, 
            'user_id' => $user->id
        ]);

       
        $response = $this->post(route('racuns.store'), [
            'narudzbina_id' => $narudzbina->id,
            'vrsta_placanja' => 'kes',
        ]);

      
        $this->assertDatabaseHas('racuns', [
            'narudzbina_id' => $narudzbina->id,
            'vrsta_placanja' => 'kes',
        ]);

      
        $this->assertDatabaseHas('stos', [
            'id' => $sto->id,
            'status' => 'Slobodan',
            'broj_stola' => 55
        ]);

       
        $response->assertRedirect(route('stos.index'));
    }
}
