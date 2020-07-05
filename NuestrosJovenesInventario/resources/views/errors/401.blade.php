@extends('layouts.public')

@section('content')
<div>
    <div class="w3-card-4" style=" margin: 0px 25%;background-color: white;">
        <header class="w3-container w3-blue" style="text-align: center;background:#d8d8d8 !important;">
            <img style="width: 30%;padding: 15px 0px;" src="{{ asset('img/logoGris.png') }}" alt="">
        </header>
        <br />
        <div class="w3-container w3-center">
            <h1>401</h1>
            <h3>Acceso no autorizado</h3>
            <form method="POST" action="{{route('logout')}}">
                {{csrf_field()}}
                <button class="btn btn-danger"><i class="fas fa-sign-in-alt"></i> Regresar</button>
            </form>
        </div>
        <br />
    </div>
</div>

@endsection