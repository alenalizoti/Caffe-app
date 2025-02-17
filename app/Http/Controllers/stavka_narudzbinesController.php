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
    public function index(Request $request)
    {
        $stavkaNarudzbines = StavkaNarudzbine::all();

        return view('stavkaNarudzbine.index', [
            'stavkaNarudzbines' => $stavkaNarudzbines,
        ]);
    }

    public function create(Request $request)
    {
        return view('stavkaNarudzbine.create');
    }

    public function store(stavka_narudzbineStoreRequest $request)
    {
        $stavkaNarudzbine = StavkaNarudzbine::create($request->validated());

        $request->session()->flash('stavkaNarudzbine.id', $stavkaNarudzbine->id);

        return redirect()->route('stavkaNarudzbines.index');
    }

    
}
