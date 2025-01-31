<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\StavkaNarudzbine;
use App\Models\stavka_narudzbines;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\stavka_narudzbinesController
 */
final class stavka_narudzbinesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $stavkaNarudzbines = stavka_narudzbines::factory()->count(3)->create();

        $response = $this->get(route('stavka_narudzbines.index'));

        $response->assertOk();
        $response->assertViewIs('stavkaNarudzbine.index');
        $response->assertViewHas('stavkaNarudzbines');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('stavka_narudzbines.create'));

        $response->assertOk();
        $response->assertViewIs('stavkaNarudzbine.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\stavka_narudzbinesController::class,
            'store',
            \App\Http\Requests\stavka_narudzbinesStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('stavka_narudzbines.store'));

        $response->assertRedirect(route('stavkaNarudzbines.index'));
        $response->assertSessionHas('stavkaNarudzbine.id', $stavkaNarudzbine->id);

        $this->assertDatabaseHas(stavkaNarudzbines, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $stavkaNarudzbine = stavka_narudzbines::factory()->create();

        $response = $this->get(route('stavka_narudzbines.show', $stavkaNarudzbine));

        $response->assertOk();
        $response->assertViewIs('stavkaNarudzbine.show');
        $response->assertViewHas('stavkaNarudzbine');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $stavkaNarudzbine = stavka_narudzbines::factory()->create();

        $response = $this->get(route('stavka_narudzbines.edit', $stavkaNarudzbine));

        $response->assertOk();
        $response->assertViewIs('stavkaNarudzbine.edit');
        $response->assertViewHas('stavkaNarudzbine');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\stavka_narudzbinesController::class,
            'update',
            \App\Http\Requests\stavka_narudzbinesUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $stavkaNarudzbine = stavka_narudzbines::factory()->create();

        $response = $this->put(route('stavka_narudzbines.update', $stavkaNarudzbine));

        $stavkaNarudzbine->refresh();

        $response->assertRedirect(route('stavkaNarudzbines.index'));
        $response->assertSessionHas('stavkaNarudzbine.id', $stavkaNarudzbine->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $stavkaNarudzbine = stavka_narudzbines::factory()->create();
        $stavkaNarudzbine = StavkaNarudzbine::factory()->create();

        $response = $this->delete(route('stavka_narudzbines.destroy', $stavkaNarudzbine));

        $response->assertRedirect(route('stavkaNarudzbines.index'));

        $this->assertModelMissing($stavkaNarudzbine);
    }
}
