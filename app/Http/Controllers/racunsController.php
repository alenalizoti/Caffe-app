<?php

namespace App\Http\Controllers;

use App\Http\Requests\racunStoreRequest;
use App\Http\Requests\racunUpdateRequest;
use App\Models\Racun;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class racunsController extends Controller
{
    public function index(Request $request)
    {
        $racuns = Racun::all();

        return view('racun.index', [
            'racuns' => $racuns,
        ]);
    }

    public function create(Request $request)
    {
        return view('racun.create');
    }

    public function store(racunStoreRequest $request)
    {
        $racun = Racun::create($request->validated());

        $request->session()->flash('racun.id', $racun->id);

        return redirect()->route('racuns.index');
    }

    public function show(Request $request, racun $racun)
    {
        return view('racun.show', [
            'racun' => $racun,
        ]);
    }

    public function edit(Request $request, racun $racun)
    {
        return view('racun.edit', [
            'racun' => $racun,
        ]);
    }

    public function update(racunUpdateRequest $request, racun $racun)
    {
        $racun->update($request->validated());

        $request->session()->flash('racun.id', $racun->id);

        return redirect()->route('racuns.index');
    }

    public function destroy(Request $request, racun $racun)
    {
        $racun->delete();

        return redirect()->route('racuns.index');
    }
}
