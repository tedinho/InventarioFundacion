@extends('layouts.app')

@section('content')
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Bienvenido {{auth()->user()->persona->nombre}}</h1>
        </div>
    </div>
    <div class="panel-footer">
        <form method="POST" action="{{route('logout')}}">
            {{csrf_field()}}
            <button class="btn btn-danger btn-block">Cerrar Sesión</button>
        </form>
    </div>
</div>
@endsection