<?php

namespace App\Http\Controllers;
use App\Models\Sto;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Racun;
use App\Models\StavkaNarudzbine;
use Illuminate\Http\Request;

class StatistikaController extends Controller
{
    public function index(){
        $kes = Racun::join('narudzbinas','racuns.narudzbina_id','=','narudzbinas.id')
        ->where('racuns.vrsta_placanja','kes')
        ->sum('narudzbinas.iznos');

        $kartica = Racun::join('narudzbinas','racuns.narudzbina_id','=','narudzbinas.id')
        ->where('racuns.vrsta_placanja','kartica')
        ->sum('narudzbinas.iznos');

        $ukupnaZarada = $kes + $kartica;

        $kesProcenat = $ukupnaZarada > 0 ? ($kes / $ukupnaZarada) * 100 : 0;
        $karticaProcenat = $ukupnaZarada > 0 ? ($kartica / $ukupnaZarada) * 100 : 0;

        $topArtikli = StavkaNarudzbine::select('proizvods.naziv',DB::raw('SUM(stavka_narudzbines.kolicina) as ukupna_kolicina'))->join('proizvods','stavka_narudzbines.proizvod_id','=','proizvods.id')
        ->groupBy('proizvods.naziv')
        ->orderByDesc('ukupna_kolicina')
        ->limit(3)
        ->get();

        $ukupnoProdato = $topArtikli->sum('ukupna_kolicina');
        foreach($topArtikli as $a){
            $a->procenat = $ukupnoProdato > 0 ? ($a->ukupna_kolicina / $ukupnoProdato) * 100 : 0;
        }

        $stolovi = Sto::select('stos.broj_stola',DB::raw('COUNT(narudzbinas.id) as numberByTable'))
        ->join('narudzbinas','narudzbinas.sto_id','=','stos.id')
        ->groupBy('stos.broj_stola')
        ->orderByDesc('numberByTable')
        ->limit(3)
        ->get();

        $stoloviUkupno = $stolovi->sum('numberByTable');
        foreach($stolovi as $s){
            $s->procenat = $stoloviUkupno > 0 ? ($s->numberByTable / $stoloviUkupno) * 100 : 0;
        }

        $konobari = User::select('users.ime',DB::raw('SUM(narudzbinas.iznos) as zaradaKonobara'))
        ->join('narudzbinas','narudzbinas.user_id','=','users.id')
        ->groupBy('users.ime')
        ->orderByDesc('zaradaKonobara')
        ->get();

        $ukupnoKonobari = $konobari->sum('zaradaKonobara');
        foreach($konobari as $k){
            $k->procenat = $ukupnoKonobari > 0 ? ($k->zaradaKonobara / $ukupnoKonobari) * 100 : 0;
        }
        // dd($ukupnoKonobari,$ukupnaZarada);
        return view('statistika.index',compact('kes','kartica','ukupnaZarada',
        'kesProcenat','karticaProcenat','topArtikli','stolovi','konobari'));
    }
}
