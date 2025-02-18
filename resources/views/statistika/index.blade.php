@extends('layouts.app')

@section('content')
<h2 class="text-center">Pregled statistike</h2>
<div class="statistika-placanje mt-5">
    <h4>Nacin placanja</h4>
    <div class="tip d-flex justify-content-around">
        <strong>Keš: {{ number_format($kes, 2) }} RSD</strong>  
        <strong>Kartica: {{ number_format($kartica, 2) }} RSD</strong>
    </div>

    <div class="progress mt-2" style="height: 30px;">
        <div class="progress-bar bg-primary" role="progressbar" 
             style="width: {{ $kesProcenat }}%;" 
             aria-valuenow="{{ $kesProcenat }}" 
             aria-valuemin="0" aria-valuemax="100">
            {{ round($kesProcenat, 2) }}%
        </div>

        <div class="progress-bar bg-danger" role="progressbar" 
             style="width: {{ $karticaProcenat }}%;" 
             aria-valuenow="{{ $karticaProcenat }}" 
             aria-valuemin="0" aria-valuemax="100">
            {{ round($karticaProcenat, 2) }}%
        </div>
    </div>
</div>
<div class="proizvodi mt-5">
    <h4>Najprodavaniji proizvodi</h4>
<div class="progress mt-2" style="height: 30px;">
        @foreach($topArtikli as $artikal)
            <div class="progress-bar" role="progressbar"
                style="width: {{ $artikal->procenat }}%; background-color: {{ ['#007bff', '#dc3545', '#ffc107'][$loop->index] }};"
                aria-valuenow="{{ $artikal->procenat }}" 
                aria-valuemin="0" aria-valuemax="100">
                {{ $artikal->naziv }} ({{ round($artikal->procenat, 2) }}%)  Prodato: {{ $artikal->ukupna_kolicina }}
            </div>
        @endforeach
    </div>
</div>
<div class="stolovi mt-5">
    <h4>Top 3 najprometnija stola</h4>
    <div class="progress mt-2" style="height: 30px;">
        @foreach ($stolovi as $sto)
        <div class="progress-bar" role="progressbar"
                style="width: {{ $sto->procenat }}%; background-color: {{ ['#007bff', '#dc3545', '#ffc107'][$loop->index] }};"
                aria-valuenow="{{ $sto->procenat }}" 
                aria-valuemin="0" aria-valuemax="100">
                Broj stola: {{ $sto->broj_stola }} ({{ round($sto->procenat, 2) }}%)  Broj naruzbina: {{ $sto->numberByTable }}
            </div>
        @endforeach
    </div>
</div>
<div class="konobari mt-5">
    <h4>Promet po konobarima</h4>
    <div class="progress mt-2" style="height: 30px;">
        @foreach ($konobari as $k)
        <div class="progress-bar" role="progressbar"
                style="width: {{ $k->procenat }}%; background-color: {{ ['#007bff', '#dc3545', '#ffc107'][$loop->index] }};"
                aria-valuenow="{{ $sto->procenat }}" 
                aria-valuemin="0" aria-valuemax="100">
                Konobar: {{ $k->ime  }}  ({{ round($k->procenat, 2) }}%)  Zarada: {{ $k->zaradaKonobara }} RSD
            </div>
        @endforeach
    </div>
</div>
@endsection