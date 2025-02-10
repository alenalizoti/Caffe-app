@extends('layouts.app')

@section('content')
<h1 class="text-center">Svi korinsici</h1>
@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<a class="btn btn-primary mb-3 " href="{{route('users.create')}}">Dodaj novog korisnika +</a>
<table class="table">
    <tr>
        <th>Ime</th>
        <th>Prezime</th>
        <th>Username</th>
        <th>Plata</th>
        <th>Tip korisnika</th>
        <th colspan="2">Opcije</th>
    </tr>
    @foreach ($users as $u)
    <tr>
        <td>{{$u->ime}}</td>
        <td>{{$u->prezime}}</td>
        <td>{{$u->username}}</td>
        <td>{{$u->plata}}</td>
        <td>{{$u->tipKorisnika->naziv}}</td>
        <td><a class="btn btn-secondary" href="{{route('users.edit',$params = [$u->id])}}">Izmeni</a></td>
        <td>
            <form action="{{ route('users.destroy', $u->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Obriši</button>
            </form>
        </td>

    </tr>
    @endforeach
</table>
@endsection