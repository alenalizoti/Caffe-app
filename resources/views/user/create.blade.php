@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-4">Kreirajte korisnika</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $e)
               <li>{{$e}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="d-flex justify-content-center w-100">
        <form class="col-md-4" action="{{route('users.store')}}"  method="POST">
            @csrf 
            <div class="form-group">
                <label for="">Ime:</label>
                <input type="text" class="form-control"  name="ime">
            </div>
            <div class="form-group ">
                <label for="">Prezime:</label>
                <input type="text" class="form-control"  name="prezime">
            </div>
            <div class="form-group>
                <label for="">Username:</label>
                <input type="text" class="form-control"  name="username">
            </div>
            <div class="form-group">
                <label for="">Lozinka:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="">Potvrdi lozinku:</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group>
                <label for="">Plata:</label>
                <input type="number" class="form-control"  name="plata">
            </div>
            <div class="form-group>
                <label for="">Tip korisnika:</label>
                <select class="form-control" name="tip_korisnika_id" id="">
                    @foreach ($tipovi as $t)
                    <option value="{{$t->id}}">{{$t->naziv}}</option>
                    @endforeach
                </select>  
            </div>
            <div class="d-flex justify-content-center mt-2 p-2">
                <button class="btn btn-primary ">Kreiraj</button>
            </div>
        </form>
    </div>
@endsection

