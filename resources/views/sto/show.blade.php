
@extends('layouts.app')

@section('content')
<div class="container-main">
    <div class=".main-parent main-parent-2">
        <div class="kategorije">
            <div class="k-child bg-success">
                <a class="kategorija" href="{{route('stos.show',$sto->id)}}">Sve</a>
            </div>
            @foreach ($kategorije as $k)
            <a class="kategorija " href="{{route('stos.show',['sto' => $sto->id,'kategorija' => $k->id])}}">
                <div class="k-child bg-success">
                    <p>{{$k->naziv}}</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="products">
            @foreach ($proizvodi as $p)
            <div class="card">
                <img src="{{asset($p->image)}}" class="card-img-top" alt="..." style="width: 100%; height: 150px; object-fit: cover;">
                <div class="card-body">
                    <div class="gornji">
                        <h5 class="card-title text-center name">{{$p->naziv}}</h5>
                        <p class="price">{{$p->cena}} RSD</p>
                    </div>
                    <div class="donji">
                    <a href="#" class="btn btn-primary add-product" data-id="{{ $p->id }}">Dodaj</a>
                    </div>
                </div>
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
            <div class="order-details">
                
            </div>
        </div>
        <div class="down">
            <div class="sum-price text-center font-weight-bold">
                
            </div>
            <div class="buttons p-2 d-flex gap-2 justify-content-center">
                <button class="btn btn-primary create-btn" data-sto-id="{{ $sto->id }}">Kreiraj</button>
                <a class="btn btn-danger exit-btn" href="{{route('stos.index') }} ">Otkazi</a>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/order.js') }}"></script>

@endsection

