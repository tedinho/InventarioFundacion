@extends('layouts.public')

@section('content')
<div>
    <div class="w3-card-4" style=" margin: 0px 25%;background-color: white;">
        <header class="w3-container w3-blue" style="text-align: center;background:#d8d8d8 !important;">
            <img style="width: 30%;padding: 15px 0px;" src="{{ asset('img/logoGris.png') }}" alt="">
        </header>
        <br />
        <div class="w3-container">
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
        <br />
    </div>
</div>
@endsection