<?php

namespace App\Http\Controllers;

use App\Http\Requests\proizvodStoreRequest;
use App\Http\Requests\proizvodUpdateRequest;
use App\Models\Proizvod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class proizvodsController extends Controller
{
    public function index(Request $request)
    {
        $proizvods = Proizvod::all();

        return view('proizvod.index', [
            'proizvods' => $proizvods,
        ]);
    }

    public function create(Request $request)
    {
        return view('proizvod.create');
    }

    public function store(proizvodStoreRequest $request)
    {
        $proizvod = Proizvod::create($request->validated());

        $request->session()->flash('proizvod.id', $proizvod->id);

        return redirect()->route('proizvods.index');
    }

    public function show(Request $request, proizvod $proizvod)
    {
        return view('proizvod.show', [
            'proizvod' => $proizvod,
        ]);
    }

    public function edit(Request $request, proizvod $proizvod)
    {
        return view('proizvod.edit', [
            'proizvod' => $proizvod,
        ]);
    }

    public function update(proizvodUpdateRequest $request, proizvod $proizvod)
    {
        $proizvod->update($request->validated());

        $request->session()->flash('proizvod.id', $proizvod->id);

        return redirect()->route('proizvods.index');
    }

    public function destroy(Request $request, proizvod $proizvod)
    {
        $proizvod->delete();

        return redirect()->route('proizvods.index');
    }
}
