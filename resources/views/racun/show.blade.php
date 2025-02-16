
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h2 class="text-center">Pregled racuna</h2>
        <div class="sifra-racuna mt-5">
            <p>Sifra racuna: {{ $racun->id }}</p>
        </div>
        <div class="vreme">
            <p>Vreme placanja: {{ $racun->created_at }}</p>
        </div>

        <div class="tabela">
            <table class="table table-striped">
                <tr>
                    <th>Br. stavki</th>
                    <th>Naziv</th>
                    <th>Kolicina</th>
                    <th>Cena</th>
                    <th>Ukupna cena</th>
                </tr>
                @php
                    $counter = 1;
                @endphp
                @foreach ($racun->narudzbina->stavkaNarudzbines as $stavka)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $stavka->proizvod->naziv }}</td>
                    <td>{{ $stavka->kolicina }}</td>
                    <td>{{ $stavka->proizvod->cena }} RSD</td>
                    <td>{{ $stavka->proizvod->cena * $stavka->kolicina }} RSD</td>
                </tr>
                @php
                    $counter++;
                @endphp
                @endforeach
            </table>
        </div>
    </div>
    @endsection

