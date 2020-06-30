@extends('layouts.app')

@section('content')
<div>
    <div class="w3-container w3-border w3-round-xlarge" style="margin: 0px 25%;">
        <br />
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align: center;">
                <img src="{{ asset('img/logo.jpg') }}" alt="">
            </div>
            <div class="panel-body">
                <form method="POST" action="{{route('login')}}">
                    {{csrf_field()}}
                    <div class="form-group" {{$errors->has('nombre') ? 'alert alert-danger' : ''}}>
                        <label for="nombre">Email</label>
                        <input class="w3-input" value="{{old('nombre')}}" type="email" name="nombre" placeholder="Ingresar E-Mail">
                        {!!$errors->first('nombre','<span class="help-block">:message</span>')!!}
                    </div>
                    <div class="form-group" {{$errors->has('password') ? 'has-error' : ''}}>
                        <label for="password">Clave</label>
                        <input class="w3-input" type="password" name="password" placeholder="Contraseña">
                        {!!$errors->first('password','<span class="help-block">:message</span>')!!}
                    </div>
                    <button class="btn btn-primary btn-block">Acceder</button>
                </form>
            </div>
        </div>
        <br />
    </div>
</div>
@endsection