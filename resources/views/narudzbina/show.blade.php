
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Narudzbina za naplatu</h2>
    <div class="order-form">
        <form action="{{ route('racuns.store') }}" method="POST">
            @csrf
            <input type="text" hidden name="narudzbina_id" value="{{ $narudzbina->id }}">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                @foreach ($narudzbina->stavkaNarudzbines as $stavka)
                    <li class="list-group-item d-flex justify-content-between">{{ $stavka->proizvod->naziv }} x {{ $stavka->kolicina }}
                        <p>{{ $stavka->proizvod->cena * $stavka->kolicina }} RSD</p>
                    </li>
                    @endforeach
                    <li class="list-group-item">Za naplatu: <b>{{$narudzbina->iznos}} RSD</b></li>
                </ul>
                <div>
                    <label class="choose-method" for="">Vrsta placanja:</label>
                    <select class="mt-2 form-control" name="vrsta_placanja" id="">
                        <option value="kes">Kes</option>
                        <option value="kartica">Kartica</option>
                    </select>
                </div>
            </div>
            <div class="buttons mt-5 p-2 d-flex gap-2 justify-content-center">
                <button class="btn btn-primary create-btn" >Naplati</button>
                <a class="btn btn-danger" href="{{route('stos.index') }} ">Otkazi</a>
            </div>
        </form>
    </div>
</div>

@endsection

