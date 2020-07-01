<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuestros Jovenes</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<style>
    body {
        background-image: url("{{ asset('img/natu.jpg') }}");
        background-color: #cccccc;
    }
</style>

<body>
    <br />
    <div class="container">
        @if(session()->has('flash'))
        <div class="alert alert-info">{{session('flash')}}</div>
        @endif
        @yield('content')
    </div>

</body>

</html>