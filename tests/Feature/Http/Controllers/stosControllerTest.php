<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Sto;
use App\Models\stos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\stosController
 */
final class stosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $stos = stos::factory()->count(3)->create();

        $response = $this->get(route('stos.index'));

        $response->assertOk();
        $response->assertViewIs('sto.index');
        $response->assertViewHas('stos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('stos.create'));

        $response->assertOk();
        $response->assertViewIs('sto.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\stosController::class,
            'store',
            \App\Http\Requests\stosStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('stos.store'));

        $response->assertRedirect(route('stos.index'));
        $response->assertSessionHas('sto.id', $sto->id);

        $this->assertDatabaseHas(stos, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $sto = stos::factory()->create();

        $response = $this->get(route('stos.show', $sto));

        $response->assertOk();
        $response->assertViewIs('sto.show');
        $response->assertViewHas('sto');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $sto = stos::factory()->create();

        $response = $this->get(route('stos.edit', $sto));

        $response->assertOk();
        $response->assertViewIs('sto.edit');
        $response->assertViewHas('sto');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\stosController::class,
            'update',
            \App\Http\Requests\stosUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $sto = stos::factory()->create();

        $response = $this->put(route('stos.update', $sto));

        $sto->refresh();

        $response->assertRedirect(route('stos.index'));
        $response->assertSessionHas('sto.id', $sto->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $sto = stos::factory()->create();
        $sto = Sto::factory()->create();

        $response = $this->delete(route('stos.destroy', $sto));

        $response->assertRedirect(route('stos.index'));

        $this->assertModelMissing($sto);
    }
}
