<?php

namespace App\Http\Controllers;

use App\Http\Requests\stoStoreRequest;
use App\Http\Requests\stoUpdateRequest;
use App\Models\Kategorija;
use App\Models\Proizvod;
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
            'stolovi' => $stos,
        ]);
    }



    public function show($id)
    {
        $sto = Sto::findOrFail($id);
        $kategorije = Kategorija::all();

        $kategorija_id = request('kategorija');
        if($kategorija_id){
            $proizvodi = Proizvod::where('kategorija_id',$kategorija_id)->get();
        }else{
            $proizvodi = Proizvod::paginate(8);
            
        }
        for($i = 0; $i<count($proizvodi);$i++){
                for($j = 1; $j < count($proizvodi); $j++){
                    if($proizvodi[$i]->naziv > $proizvodi[$j]->naziv){
                        $temp = $proizvodi[$i];
                        $proizvodi[$i] = $proizvodi[$j];
                        $proizvodi[$j] = $temp;
                    }
                }
            }
        return view('sto.show', [
            'sto' => $sto,
            'kategorije' => $kategorije,
            'proizvodi' => $proizvodi
        ]);
    }

    
}
