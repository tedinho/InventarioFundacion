@extends('layouts.private')

@section('content')

<form action="{{route('guardarTalla')}}" method="POST">
<div w3-row>

    <div class="w3-container w3-half">
    {{ csrf_field() }}
    <h3> Resgistrar Talla</h3>

    <label for="siglas">{{'Siglas'}}</label><br />
    <input required="true" value="{{$talla['siglas']??''}}" type="text" class="w3-input w3-border" 
    id="siglas" name="siglas">
    <br />
    
    @if (($talla??''))
    <input style="display: none;" value="{{$talla['id']??''}}" type="text" class="w3-input w3-border"
    id="id_talla" name="id_talla" >
    @endif

    <label for="nombre">{{'Nombre'}}</label><br />
    <input required="true" value="{{$talla['nombre']??''}}" type="text" class="w3-input w3-border" 
    id="nombre" name="nombre">
    <br />
    

    <label for="estado">{{'Estado'}}</label><br />
    <input required="true" value="{{$talla['estado']??''}}" type="text" class="w3-input w3-border" 
    id="estado" name="estado">
    <br />

    <br /> <br />
    <br />
    <button class="w3-button w3-block boton-guardar"><i class="far fa-save"></i> Guardar</button>
    <br />


    </div>

</div>
</form>
@endsection