@extends('layouts.private')

@section('content')
@if(Session::has('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif
<form action="{{route('guardarTipoPrenda')}}" method="POST">
    <div w3-row>
        <div class="w3-container w3-half">
            {{ csrf_field() }}
            <h3>Nuevo Tipo de Prenda</h3>
            <label for="nombre">{{'Nombre'}}</label><br />
            <input value="{{$tipo_prenda['nombre']??''}}"  type="text" class="w3-input w3-border" id="nombre" name="nombre" required="true">
            @if (($tipo_prenda??''))
            <input style="display: none;" value="{{$tipo_prenda['id']??''}}" type="text" class="w3-input w3-border"
                id="id" name="id">
            @endif

            <br /> <br />
            <br />
            <button class="w3-button w3-block boton-guardar"><i class="far fa-save"></i> Guardar</button>
            <br /> <br />
        </div>
    </div>
    <br /> <br />

</form>
@endsection