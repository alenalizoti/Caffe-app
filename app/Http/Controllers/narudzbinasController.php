<?php

namespace App\Http\Controllers;

use App\Http\Requests\narudzbinaStoreRequest;
use App\Http\Requests\narudzbinaUpdateRequest;
use App\Models\Narudzbina;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class narudzbinasController extends Controller
{
    public function index(Request $request)
    {
        $narudzbinas = Narudzbina::all();

        return view('narudzbina.index', [
            'narudzbinas' => $narudzbinas,
        ]);
    }

    public function create(Request $request)
    {
        return view('narudzbina.create');
    }

    public function store(narudzbinaStoreRequest $request)
    {
        $narudzbina = Narudzbina::create($request->validated());

        $request->session()->flash('narudzbina.id', $narudzbina->id);

        return redirect()->route('narudzbinas.index');
    }

    public function show(Request $request, narudzbina $narudzbina)
    {
        return view('narudzbina.show', [
            'narudzbina' => $narudzbina,
        ]);
    }

    public function edit(Request $request, narudzbina $narudzbina)
    {
        return view('narudzbina.edit', [
            'narudzbina' => $narudzbina,
        ]);
    }

    public function update(narudzbinaUpdateRequest $request, narudzbina $narudzbina)
    {
        $narudzbina->update($request->validated());

        $request->session()->flash('narudzbina.id', $narudzbina->id);

        return redirect()->route('narudzbinas.index');
    }

    public function destroy(Request $request, narudzbina $narudzbina)
    {
        $narudzbina->delete();

        return redirect()->route('narudzbinas.index');
    }
}
