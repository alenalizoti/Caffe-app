
@extends('layouts.app')

@section('content')
    <h2 class="text-center">Stolovi</h2>
    <div class="main-parent">
        <div class="parent-sto">
            @foreach ($stolovi as $sto)
            <a class="single-sto" href="{{route('stos.show', $sto->id)}}">
                <div class="sto {{$sto->status == 'Slobodan' ? 'bg-success' : 'bg-danger'}}">
                    <div class="child-sto">
                        <p class="text-center">{{$sto->broj_stola}}</p>
                        <p class="text-center">{{$sto->status}}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection

