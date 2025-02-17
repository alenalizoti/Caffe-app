@extends('layouts.app')

@section('content')
<h2 class="text-center mb-4">Izmenite korisnika</h2>
@if ($errors->any())
    <div class="alert-danger alert">
        <ul>
            @foreach ($errors->all() as $e)
                <li>{{$e}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="d-flex justify-content-center w-100">
    <form class="col-md-4" action="{{route('users.update',$user->id)}}" method="POST">
        @csrf 
        @METHOD('PUT')
        <div class="form-group">
            <label for="">Ime:</label>
            <input type="text" class="form-control" value="{{$user->ime}}" name="ime">
        </div>
        <div class="form-group ">
            <label for="">Prezime:</label>
            <input type="text" class="form-control" value="{{$user->prezime}}" name="prezime">
        </div>
        <div class="form-group>
            <label for="">Username:</label>
            <input type="text" class="form-control" value="{{$user->username}}" name="username">
        </div>
        <div class="form-group>
            <label for="">Plata:</label>
            <input type="number" class="form-control" value="{{$user->plata}}" name="plata">
        </div>
        <div class="form-group>
            <label for="">Tip korisnika:</label>
            <select class="form-control" name="tip_korisnika_id" id="">
                @foreach ($tipovi as $t)
                    @if ($user->tipKorisnika->id == $t->id)
                    
                    <option selected value="{{$t->id}}">{{$t->naziv}}</option> 
                    @else
                    <option value="{{$t->id}}">{{$t->naziv}}</option>
                    @endif
                @endforeach
            </select>  
        </div>
        <div class="d-flex justify-content-center mt-2 p-2 gap-3">
            <button class="btn btn-success ">Izmeni</button>
            <a href="{{ route('users.index') }}" class="btn btn-danger">Otkazi</a>
        </div>
    </form>
</div>
@endsection