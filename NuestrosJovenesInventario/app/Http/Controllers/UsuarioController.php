<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(Request $request)
    {
        $request->user()->authorizeRoles(['ADMINISTRADOR']);
        $datos['usuarios'] = Usuario::paginate(10);
        return view('admin/usuario-lista', $datos);
    }

    public function getUsuario(Request $request)
    {
        $request->user()->authorizeRoles(['ADMINISTRADOR']);
        $usuario = new Usuario();
        return view('admin/usuario-form', $usuario);
    }

    public function guardarUsuario(Request $request)
    {
        $idPersona = DB::table('personas')->insertGetId(
            [
                'nombre' => $request->get('nombre'),
                'apellido' => $request->get('apellido'),
                'numero_identificacion' => $request->get('cedula'),
                'estado' => 'A'
            ]
        );

        $idUsuario = DB::table('usuarios')->insertGetId(
            [
                'nombre' => $request->get('correo'),
                'clave' => md5($request->get('clave')),
                'estado' => 'A',
                'id_persona' => $idPersona
            ]
        );

        return Redirect::route('usuario-lista')->with('mensaje', 'Usuario Creado');
    }
}
