@extends('layouts.private')

@section('content')
<form action="{{route('guardarUsuario')}}" method="POST">
    <div w3-row>
        <div class="w3-container w3-half">
            {{ csrf_field() }}
            <h3>Nuevo Usuario</h3>
            <label for="nombre">{{'Nombre'}}</label><br />
            <input type="text" class="w3-input w3-border" id="nombre" name="nombre">
            <br />
            <label for="apellido">{{'Apellido'}}</label><br />
            <input type="text" class="w3-input w3-border" id="apellido" name="apellido">
            <br />
            <label for="cedula">{{'Número de documento'}}</label><br />
            <input type="text" class="w3-input w3-border" id="cedula" name="cedula">
            <br />
            <label for="correo">{{'Correo'}}</label><br />
            <input type="email" class="w3-input w3-border" id="correo" name="correo">
            <br />
            <label for="clave">{{'Contraseña'}}</label><br />
            <input type="password" class="w3-input w3-border" id="clave" name="clave">
            <br />
            <button class="w3-button w3-block boton-guardar"><i class="far fa-save"></i> Guardar</button>
        </div>
    </div>


</form>
@endsection