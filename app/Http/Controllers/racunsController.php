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
        $racuni = Racun::paginate(10);
       

        return view('racun.index', [
            'racuni' => $racuni,
        ]);
    }

  

    public function store(racunStoreRequest $request)
    {
        $validatedData = $request->validated();
        // dd($validatedData);
        $narudzbina = Narudzbina::find($validatedData['narudzbina_id']);
        if (!$narudzbina) {
            return redirect()->back()->withErrors(['narudzbina_id' => 'Narudzbina nije pronađena.']);
        }
        $racun = Racun::create([
            'narudzbina_id' => $narudzbina->id, 
            'vrsta_placanja' => $validatedData['vrsta_placanja']
        ]);

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

   
}
