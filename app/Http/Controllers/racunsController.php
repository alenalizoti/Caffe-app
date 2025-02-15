<?php

namespace App\Http\Controllers;

use App\Http\Requests\racunStoreRequest;
use App\Http\Requests\racunUpdateRequest;
use App\Models\Narudzbina;
use App\Models\Racun;
use App\Models\Sto;
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
        $validatedData = $request->validated();
        // dd($validatedData);
        $racun = Racun::create([
            'narudzbina_id' => $validatedData['narudzbina_id'], 
            'vrsta_placanja' => $validatedData['vrsta_placanja']
        ]);

        $narudzbina = Narudzbina::find($validatedData['narudzbina_id']);
        if (!$narudzbina) {
            return redirect()->back()->withErrors(['narudzbina_id' => 'Narudzbina nije pronađena.']);
        }
        $sto = Sto::find($narudzbina->sto_id);
        if($sto){
            $sto->status = 'Slobodan';
            $sto->save();
        }
        
        $request->session()->flash('racun.id', $racun->id);

        return redirect()->route('stos.index');
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
