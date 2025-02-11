
@extends('layouts.app')

@section('content')
<div class="container-main">
    <div class=".main-parent main-parent-2">
        <div class="kategorije">
            <div class="k-child">
                <p>Sve</p>
            </div>
            @foreach ($kategorije as $k)
            <div class="k-child">
                <p>{{$k->naziv}}</p>
            </div>
            @endforeach
        </div>
    </div>
    <div class="orders">
        <div class="upper">
            <p class="text-center order-title">Stavke narudzbine</p>
            <div class="order-date">
                <p class="pl-2">Br. stola: {{$sto->broj_stola}}</p>
                <p class="date">{{date(now())}}</p>
            </div>
        </div>
        <div class="order-details">
            
        </div>
        <div class="down">
            <div class="buttons p-2 d-flex gap-2 justify-content-center">
                <button class="btn btn-primary">Kreiraj</button>
                <button class="btn btn-danger">Otkazi</button>
            </div>
        </div>
    </div>
</div>
@endsection

