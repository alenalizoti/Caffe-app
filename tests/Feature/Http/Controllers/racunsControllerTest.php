<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Racun;
use App\Models\racuns;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\racunsController
 */
final class racunsControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $racuns = racuns::factory()->count(3)->create();

        $response = $this->get(route('racuns.index'));

        $response->assertOk();
        $response->assertViewIs('racun.index');
        $response->assertViewHas('racuns');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('racuns.create'));

        $response->assertOk();
        $response->assertViewIs('racun.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\racunsController::class,
            'store',
            \App\Http\Requests\racunsStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('racuns.store'));

        $response->assertRedirect(route('racuns.index'));
        $response->assertSessionHas('racun.id', $racun->id);

        $this->assertDatabaseHas(racuns, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $racun = racuns::factory()->create();

        $response = $this->get(route('racuns.show', $racun));

        $response->assertOk();
        $response->assertViewIs('racun.show');
        $response->assertViewHas('racun');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $racun = racuns::factory()->create();

        $response = $this->get(route('racuns.edit', $racun));

        $response->assertOk();
        $response->assertViewIs('racun.edit');
        $response->assertViewHas('racun');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\racunsController::class,
            'update',
            \App\Http\Requests\racunsUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $racun = racuns::factory()->create();

        $response = $this->put(route('racuns.update', $racun));

        $racun->refresh();

        $response->assertRedirect(route('racuns.index'));
        $response->assertSessionHas('racun.id', $racun->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $racun = racuns::factory()->create();
        $racun = Racun::factory()->create();

        $response = $this->delete(route('racuns.destroy', $racun));

        $response->assertRedirect(route('racuns.index'));

        $this->assertModelMissing($racun);
    }
}
