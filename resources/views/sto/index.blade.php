
@extends('layouts.app')

@section('content')
    <h2 class="text-center">Stolovi</h2>
    <div class="main-parent">
        <div class="parent-sto">
            @foreach ($stolovi as $sto)
            @php
                $narudzbina = $sto->narudzbina; // Lakše za rad
            
            @endphp
                    
            <a class="single-sto" href="{{ $narudzbina && $sto->status == 'Zauzet' ? route('narudzbinas.show', $narudzbina->id) : route('stos.show', $sto->id) }}">
                <div class="sto {{$sto->status == 'Slobodan' ? 'bg-success' : 'bg-danger'}}">
                    <div class="child-sto">
                        <p class="text-center">{{$sto->broj_stola}}</p>
                        <p class="text-center">{{$sto->status}}</p>
                        @if (isset($sto->status) && $sto->status == 'Zauzet')
                            <p class="text-center">{{ $sto->narudzbina->iznos }} RSD</p>
                        @endif
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection

