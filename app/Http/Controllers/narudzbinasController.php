<?php

namespace App\Http\Controllers;

use App\Http\Requests\narudzbinaStoreRequest;
use App\Http\Requests\narudzbinaUpdateRequest;
use App\Models\Narudzbina;
use App\Models\StavkaNarudzbine;
use App\Models\Sto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Log;

class narudzbinasController extends Controller
{
   
    public function store(narudzbinaStoreRequest $request)
    {
        
        $validatedData = $request->validated();
        

        $narudzbina = Narudzbina::create([
            'user_id' => Auth::user()->id,
            'sto_id' => $validatedData['sto_id'],
            'iznos' => $validatedData['iznos'],
        ]);

        foreach($validatedData['items'] as $item){
            StavkaNarudzbine::create([
                'narudzbina_id' => $narudzbina->id,
                'proizvod_id' => $item['product_id'],
                'kolicina' => $item['quantity']
            ]);
        }
        $sto = Sto::find($validatedData['sto_id']);
        $sto->status = 'Zauzet';
        $sto->save();

        $request->session()->flash('narudzbina.id', $narudzbina->id);

        return response()->json([
            'success' => true,
            'message' => 'Narudžbina je uspešno kreirana!',
            'narudzbina_id' => $narudzbina->id, 
            'redirect_url' => route('stos.index')
        ]);
        
    }

    public function show(Request $request, narudzbina $narudzbina)
    {
        return view('narudzbina.show', [
            'narudzbina' => $narudzbina,
        ]);
    }

   
}
