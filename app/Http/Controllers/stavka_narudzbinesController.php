<?php

namespace App\Http\Controllers;

use App\Http\Requests\stavka_narudzbineStoreRequest;
use App\Http\Requests\stavka_narudzbineUpdateRequest;
use App\Models\StavkaNarudzbine;
use App\Models\stavka_narudzbine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class stavka_narudzbinesController extends Controller
{
    public function index(Request $request): Response
    {
        $stavkaNarudzbines = StavkaNarudzbine::all();

        return view('stavkaNarudzbine.index', [
            'stavkaNarudzbines' => $stavkaNarudzbines,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('stavkaNarudzbine.create');
    }

    public function store(stavka_narudzbineStoreRequest $request): Response
    {
        $stavkaNarudzbine = StavkaNarudzbine::create($request->validated());

        $request->session()->flash('stavkaNarudzbine.id', $stavkaNarudzbine->id);

        return redirect()->route('stavkaNarudzbines.index');
    }

    public function show(Request $request, stavka_narudzbine $stavkaNarudzbine): Response
    {
        return view('stavkaNarudzbine.show', [
            'stavkaNarudzbine' => $stavkaNarudzbine,
        ]);
    }

    public function edit(Request $request, stavka_narudzbine $stavkaNarudzbine): Response
    {
        return view('stavkaNarudzbine.edit', [
            'stavkaNarudzbine' => $stavkaNarudzbine,
        ]);
    }

    public function update(stavka_narudzbineUpdateRequest $request, stavka_narudzbine $stavkaNarudzbine): Response
    {
        $stavkaNarudzbine->update($request->validated());

        $request->session()->flash('stavkaNarudzbine.id', $stavkaNarudzbine->id);

        return redirect()->route('stavkaNarudzbines.index');
    }

    public function destroy(Request $request, stavka_narudzbine $stavkaNarudzbine): Response
    {
        $stavkaNarudzbine->delete();

        return redirect()->route('stavkaNarudzbines.index');
    }
}
