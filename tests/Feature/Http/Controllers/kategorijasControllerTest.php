<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Kategorija;
use App\Models\kategorijas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\kategorijasController
 */
final class kategorijasControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $kategorijas = kategorijas::factory()->count(3)->create();

        $response = $this->get(route('kategorijas.index'));

        $response->assertOk();
        $response->assertViewIs('kategorija.index');
        $response->assertViewHas('kategorijas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('kategorijas.create'));

        $response->assertOk();
        $response->assertViewIs('kategorija.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\kategorijasController::class,
            'store',
            \App\Http\Requests\kategorijasStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('kategorijas.store'));

        $response->assertRedirect(route('kategorijas.index'));
        $response->assertSessionHas('kategorija.id', $kategorija->id);

        $this->assertDatabaseHas(kategorijas, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $kategorija = kategorijas::factory()->create();

        $response = $this->get(route('kategorijas.show', $kategorija));

        $response->assertOk();
        $response->assertViewIs('kategorija.show');
        $response->assertViewHas('kategorija');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $kategorija = kategorijas::factory()->create();

        $response = $this->get(route('kategorijas.edit', $kategorija));

        $response->assertOk();
        $response->assertViewIs('kategorija.edit');
        $response->assertViewHas('kategorija');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\kategorijasController::class,
            'update',
            \App\Http\Requests\kategorijasUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $kategorija = kategorijas::factory()->create();

        $response = $this->put(route('kategorijas.update', $kategorija));

        $kategorija->refresh();

        $response->assertRedirect(route('kategorijas.index'));
        $response->assertSessionHas('kategorija.id', $kategorija->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $kategorija = kategorijas::factory()->create();
        $kategorija = Kategorija::factory()->create();

        $response = $this->delete(route('kategorijas.destroy', $kategorija));

        $response->assertRedirect(route('kategorijas.index'));

        $this->assertModelMissing($kategorija);
    }
}
