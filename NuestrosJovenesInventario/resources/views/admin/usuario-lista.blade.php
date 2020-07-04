@extends('layouts.private')

@section('content')
<div class="bar-options">
    <a class="w3-button w3-blue w3-block w3-round" href="usuario-form">
        <i class="fas fa-plus-circle"></i>
        Nuevo Usuario
    </a>
</div>

<div class="w3-row">
    <div class="w3-col l2 m2 s12">
        <label for="txt-usuario">Nombre Usuario</label>
        <input name="txt-usuario" type="text" class="w3-input w3-border">
    </div>
    <div class="w3-col l1 m1 s12">
        <br />
        <button class="w3-button"> <i class="fas fa-search fa-2x"></i></button>
    </div>
</div>
<br />
<!-- encabezado -->
<div layout="block" class="w3-row row-header">
    <div class="w3-col s10 m10 l10">
        <div class="w3-row w3-hide-small">
            <div class="w3-col l3 m3">Nombre</div>
            <div class="w3-col l3 m3">Número de Documento</div>
            <div class="w3-col l3 m3">Nombre Usuario</div>
            <div class="w3-col l3 m3">Estado</div>
        </div>
        <div class="w3-row w3-hide-medium w3-hide-large">
            <div>Usuario</div>
        </div>
    </div>

    <div class="w3-col m2 l2 w3-hide-small col-acciones">Acciones</div>
</div>

<!-- Cuerpo -->
@foreach ($usuarios as $u)
<div class="w3-row bg-#{(cont.index) mod 2}">
    <div class="w3-col s10 m10 l10 col-datos">
        <div class="w3-row">
            <div>
                <div class="w3-col s6 w3-hide-medium w3-hide-large">Nombre</div>
                <div class="w3-col l3 m3 s6">{{$u->persona->nombre}} {{$u->persona->apellido}}</div>
            </div>
            <div>
                <div class="w3-col s6 w3-hide-medium w3-hide-large">Número de documento</div>
                <div class="w3-col l3 m3 s6">{{$u->persona->numero_identificacion}}</div>
            </div>
            <div>
                <div class="w3-col s6 w3-hide-medium w3-hide-large">Nombre Usuario</div>
                <div class="w3-col l3 m3 s4">{{$u->nombre}}</div>
            </div>
            <div>
                <div class="w3-col s6 w3-hide-medium w3-hide-large">Estado</div>
                <div class="w3-col l3 m3 s6">{{$u->estado}}</div>
            </div>
        </div>
    </div>

    <div class="w3-col s2 m2 l2 col-acciones">
        <button title="editar"><i class="fas fa-lg fa-edit"></i></button>
        <button title="inactivar"><i class="fas fa-lg fa-trash w3-text-red"></i></button>
    </div>
</div>
@endforeach
@endsection