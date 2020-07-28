@extends('layouts.private')

@section('content')

<form action="{{route('guardarGenero')}}" method="POST">
<div w3-row>

    <div class="w3-container w3-half">
    {{ csrf_field() }}
    <h3> Resgistrar Genero</h3>
    @if (($genero??''))
    <input style="display: none;" value="{{$genero['id']??''}}" type="text" class="w3-input w3-border"
    id="id_genero" name="id_genero" >
    @endif

    <label for="tipo">{{'Tipo'}}</label><br />
    <input required="true" value="{{$genero['tipo']??''}}" type="text" class="w3-input w3-border" 
    id="tipo" name="tipo">
    <br />

    <label for="estado">{{'Estado'}}</label><br />
    <input required="true" value="{{$genero['estado']??''}}" type="text" class="w3-input w3-border" 
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