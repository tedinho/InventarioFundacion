@extends('layouts.private')

@section('content')
@if(Session::has('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif
<form action="{{route('guardarPersona')}}" method="POST">
    <div w3-row>
        <div class="w3-container w3-half">
            {{ csrf_field() }}
            <h3>Nueva Persona</h3>
            <label for="nombre">{{'Nombre'}}</label><br />
            <input value="{{$persona['nombre']??''}}" type="text" class="w3-input w3-border" id="nombre" name="nombre" required="true">
            @if (($persona??''))
            <input style="display: none;" value="{{$persona['id']??''}}" type="text" class="w3-input w3-border"
                id="id" name="id" >
            @endif
            <br />
            <label for="apellido">{{'Apellido'}}</label><br />
            <input value="{{$persona['apellido']??''}}" type="text" class="w3-input w3-border" id="apellido"
                name="apellido" required="true">
            <br />
            <label for="cedula">{{'Número de Cédula'}}</label><br />
            <input value="{{$persona['numero_identificacion']??''}}" type="text" class="w3-input w3-border" id="cedula"
                name="cedula" required="true">
            <br />
            

         <br />
            <br />
            <button class="w3-button w3-block boton-guardar"><i class="far fa-save"></i> Guardar</button>
            <br /> <br />
        </div>
    </div>
    <br /> <br />

</form>
@endsection