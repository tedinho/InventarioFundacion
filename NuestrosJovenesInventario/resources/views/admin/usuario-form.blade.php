@extends('layouts.private')

@section('content')
<form action="{{route('guardarUsuario')}}" method="POST">
    <div w3-row>
        <div class="w3-container w3-half">
            {{ csrf_field() }}
            <h3>Nuevo Usuario</h3>
            <label for="nombre">{{'Nombre'}}</label><br />
            <input required="true" value="{{$persona['nombre']??''}}" type="text" class="w3-input w3-border" id="nombre"
                name="nombre">
            <br />
            <label for="apellido">{{'Apellido'}}</label><br />
            <input required="true" value="{{$persona['apellido']??''}}" type="text" class="w3-input w3-border"
                id="apellido" name="apellido">
            <br />
            <label for="cedula">{{'Número de documento'}}</label><br />
            <input required="true" value="{{$persona['numero_identificacion']??''}}" type="text"
                class="w3-input w3-border" id="cedula" name="cedula">
            <br />
            <label for="correo">{{'Correo'}}</label><br />
            <input required="true" value="{{$usuario['nombre']??''}}" type="email" class="w3-input w3-border"
                id="correo" name="correo">
            <br />
            @if (!($usuario??''))
            <label for="clave">{{'Contraseña'}}</label><br />
            <input type="password" class="w3-input w3-border" id="clave" name="clave">
            <br />
            @endif
            @if (($usuario??''))
            <input style="display: none;" value="{{$usuario['id']??''}}" type="text" class="w3-input w3-border"
                id="id_usuario" name="id_usuario">
            <input style="display: none;" value="{{$persona['id']??''}}" type="text" class="w3-input w3-border"
                id="id_persona" name="id_persona">
            @endif


            <label for="roles">{{'Seleccionar Rol'}}</label><br />

            <select required="true" name="rol" id="rol" class="w3-select">
                <option value="" selected disabled>Seleccione</option>
                @foreach( $roles as $key => $value )
                @if (($rol??''))
                <option value="{{ $key }}" {{ ( $key == $rol['role_id']) ? 'selected' : '' }}>{{ $value }}</option>
                @endif
                @if (!($rol??''))
                <option value="{{ $key }}">{{ $value }}</option>
                @endif
                @endforeach
            </select>

            <br /> <br />
            <br />
            <button class="w3-button w3-block boton-guardar"><i class="far fa-save"></i> Guardar</button>
            <br /> <br />
        </div>
    </div>
    <br /> <br />

</form>
@endsection