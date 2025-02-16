
@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-10">Racuni</h2>
    <div class="container">
        <div class="racuni mt-8">
           @foreach ($racuni as $racun)
           <div class="racun d-flex justify-content-between" onclick="window.location.href='{{ route('racuns.show', $racun->id) }}'">
               <div class="racun-about d-flex gap-4">
                    <p class="sifra m-2">Sifra: {{ $racun->id }}</p>
                    <p class="line"></p>
                    <p class="datetime m-2">{{ $racun->created_at }}</p>
               </div>
               <div class="racun-cena d-flex ">
                   <p class="line"></p>
                   <p class="m-2" style="width:8em">{{ $racun->narudzbina->iznos }} RSD</p>
               </div>
           </div>
           @endforeach
            
           <div class="mt-4 d-flex justify-content-center">
                {{ $racuni->links() }}
            </div>
        </div>
    </div>
@endsection

