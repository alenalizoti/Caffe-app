@extends('layouts.app')

@section('content')
<h2 class="text-center">Pregled statistike</h2>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="">
    <div class="grid-div">
        
        <div class="statistika-placanje mt-5 statistika">
            <h4>Način plaćanja</h4>
            <canvas id="placanjeChart"></canvas>
        </div>
    
       
        <div class="proizvodi mt-5 statistika">
            <h4>Najprodavaniji proizvodi</h4>
            <canvas id="proizvodiChart"></canvas>
        </div>
    
        
        <div class="stolovi mt-5 statistika">
            <h4>Top 3 najprometnija stola</h4>
            <canvas id="stoloviChart"></canvas>
        </div>
    
        
        <div class="konobari mt-5 statistika">
            <h4>Promet po konobarima</h4>
            <canvas id="konobariChart"></canvas>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("Kes: {{ $kes }}");
        console.log("Kartica: {{ $kartica }}");
        console.log("Top artikli:", @json($topArtikli));
        console.log("Stolovi:", @json($stolovi));
        console.log("Konobari:", @json($konobari));
    });
    document.addEventListener("DOMContentLoaded", function () {
       
        let placanjeCtx = document.getElementById('placanjeChart').getContext('2d');
        new Chart(placanjeCtx, {
            type: 'pie',
            data: {
                labels: ['Keš', 'Kartica'],
                datasets: [{
                    data: [{{ $kes }}, {{ $kartica }}],
                    backgroundColor: ['#007bff', '#dc3545']
                }]
            }
        });

      
        let proizvodiCtx = document.getElementById('proizvodiChart').getContext('2d');
        new Chart(proizvodiCtx, {
            type: 'pie',
            data: {
                labels: @json($topArtikli->pluck('naziv')),
                datasets: [{
                    data: @json($topArtikli->pluck('ukupna_kolicina')),
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107']
                }]
            }
        });

        let stoloviCtx = document.getElementById('stoloviChart').getContext('2d');
        new Chart(stoloviCtx, {
            type: 'pie',
            data: {
                labels: @json($stolovi->pluck('broj_stola')),
                datasets: [{
                    data: @json($stolovi->pluck('numberByTable')),
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107']
                }]
            }
        });


        let konobariCtx = document.getElementById('konobariChart').getContext('2d');
        new Chart(konobariCtx, {
            type: 'pie',
            data: {
                labels: @json($konobari->pluck('ime')),
                datasets: [{
                    data: @json($konobari->pluck('zaradaKonobara')),
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107']
                }]
            }
        });
    });
</script>

@endsection