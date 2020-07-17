@extends('layouts.private')

@section('content')
<div class="bar-options">
    <a class="w3-button w3-blue w3-block w3-round" href="usuario-form">
        <i class="fas fa-plus-circle"></i>
        Nuevo Usuario
    </a>
</div>
<h1>Administración de usuarios</h1>
@if(Session::has('mensaje'))
<div class="alert alert-info">{{session('mensaje')}}</div>
@endif
<form method="POST" action="{{route('buscar-usuario')}}">
    {{csrf_field()}}
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
</form>
<br />

@if ($usuarios->isEmpty())
<div class="w3-panel w3-pale-blue w3-round">
    <br />
    <p>No existen registros</p>
</div>
@endif


<!-- encabezado -->
@if ($usuarios->isNotEmpty())
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
@endif
<!-- Cuerpo -->
@foreach ($usuarios as $u)
<div class="w3-row bg-{{ $loop->index %  2}}">
    <div class="w3-col s10 m10 l10 col-datos">
        <div class="w3-row">
            <div>
                <div class="w3-col s6 w3-hide-medium w3-hide-large">Nombre</div>
                <div class="w3-col l3 m3 s6">
                    <p>{{$u->persona->nombre}} {{$u->persona->apellido}}</p>
                </div>
            </div>
            <div>
                <div class="w3-col s6 w3-hide-medium w3-hide-large">Número de documento</div>
                <div class="w3-col l3 m3 s6">
                    <p>{{$u->persona->numero_identificacion}}</p>
                </div>
            </div>
            <div>
                <div class="w3-col s6 w3-hide-medium w3-hide-large">Nombre Usuario</div>
                <div class="w3-col l3 m3 s6">
                    <p>{{$u->nombre}}</p>
                </div>
            </div>
            <div>
                <div class="w3-col s6 w3-hide-medium w3-hide-large">Estado</div>
                <div class="w3-col l3 m3 s6">
                    <p>{{$u->estado}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="w3-col s2 m2 l2 col-acciones">
        <a href="{{url('editarUsuario/'.$u->id)}}" class="w3-button"><i class="fas fa-lg fa-edit"></i></a>
        @if($u->estado=='A')
        <form style="display: inline;" action="{{route('inactivarUsuario',['id' => $u->id])}}" method="POST">
            {{csrf_field()}}
            <button class="w3-button" title="Inactivar"><i class="fas fa-lg fa-trash w3-text-red"></i></button>
        </form>
        @endif
        @if($u->estado=='I')
        <form style="display: inline;" action="{{route('activarUsuario',['id' => $u->id])}}" method="POST">
            {{csrf_field()}}
            <button class="w3-button" title="Activar"><i class="fas fa-lg fa-check w3-text-green"></i></button>
        </form>
        @endif
    </div>
</div>
@endforeach
{{$usuarios->links()}}
@endsection