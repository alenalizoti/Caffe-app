<?php

namespace App\Http\Controllers;

use App\Http\Requests\stoStoreRequest;
use App\Http\Requests\stoUpdateRequest;
use App\Models\Sto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class stosController extends Controller
{
    public function index(Request $request)
    {
        $stos = Sto::all();

        return view('sto.index', [
            'stos' => $stos,
        ]);
    }

    public function create(Request $request)
    {
        return view('sto.create');
    }

    public function store(stoStoreRequest $request)
    {
        $sto = Sto::create($request->validated());

        $request->session()->flash('sto.id', $sto->id);

        return redirect()->route('stos.index');
    }

    public function show(Request $request, sto $sto)
    {
        return view('sto.show', [
            'sto' => $sto,
        ]);
    }

    public function edit(Request $request, sto $sto)
    {
        return view('sto.edit', [
            'sto' => $sto,
        ]);
    }

    public function update(stoUpdateRequest $request, sto $sto)
    {
        $sto->update($request->validated());

        $request->session()->flash('sto.id', $sto->id);

        return redirect()->route('stos.index');
    }

    public function destroy(Request $request, sto $sto)
    {
        $sto->delete();

        return redirect()->route('stos.index');
    }
}
