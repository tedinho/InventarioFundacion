<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuestros Jovenes</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/inventario.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    @section('sidebar')
    <div style="width: 260px !important;display:none" class="w3-sidebar w3-bar-block w3-border-right" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large">Cerrar Menú &times;</button>
        <p class="w3-bar-item w3-buttom">Menú Principal</p>

        @foreach ($menuLista as $item)
        <a href="{{$item->url}}" class="w3-bar-item w3-button"><i class="fas {{$item->icono}}"></i>
            {{$item->nombre}}</a>
        @endforeach
    </div>
    @show
    <div class="w3-row" style="background-color: #d8d8d8 !important;">
        <div class="w3-col m1 l1 s1">
            <button class="w3-button w3-xlarge" onclick="w3_open()">☰</button>
        </div>
        <div class="w3-col m8 l8 s12">
            <img style="width: 8%;padding: 5px 0px;" src="{{ asset('img/logoGris.png') }}" alt="">
        </div>
        <div class="w3-col m3 l3 s12">
            <form method="POST" action="{{route('logout')}}" style="margin-left: 75%;margin-top: 8px;">
                {{csrf_field()}}
                <button class="btn btn-danger"><i class="fas fa-sign-in-alt"></i> Salir</button>
            </form>
        </div>
    </div>
    <div class="w3-container">
        @yield('content')
    </div>
    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>
</body>

</html>