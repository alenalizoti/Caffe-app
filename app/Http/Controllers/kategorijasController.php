<?php

namespace App\Http\Controllers;

use App\Http\Requests\kategorijaStoreRequest;
use App\Http\Requests\kategorijaUpdateRequest;
use App\Models\Kategorija;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class kategorijasController extends Controller
{
    public function index(Request $request)
    {
        $kategorijas = Kategorija::all();

        return view('kategorija.index', [
            'kategorijas' => $kategorijas,
        ]);
    }

    public function create(Request $request)
    {
        return view('kategorija.create');
    }

    public function store(kategorijaStoreRequest $request)
    {
        $kategorija = Kategorija::create($request->validated());

        $request->session()->flash('kategorija.id', $kategorija->id);

        return redirect()->route('kategorijas.index');
    }

    public function show(Request $request, kategorija $kategorija)
    {
        return view('kategorija.show', [
            'kategorija' => $kategorija,
        ]);
    }

    public function edit(Request $request, kategorija $kategorija)
    {
        return view('kategorija.edit', [
            'kategorija' => $kategorija,
        ]);
    }

    public function update(kategorijaUpdateRequest $request, kategorija $kategorija)
    {
        $kategorija->update($request->validated());

        $request->session()->flash('kategorija.id', $kategorija->id);

        return redirect()->route('kategorijas.index');
    }

    public function destroy(Request $request, kategorija $kategorija)
    {
        $kategorija->delete();

        return redirect()->route('kategorijas.index');
    }
}
