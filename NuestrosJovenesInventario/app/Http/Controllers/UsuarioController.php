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
use Symfony\Component\Console\Input\Input;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(Request $request)
    {
        $request->user()->authorizeRoles(['ADMINISTRADOR']);
        $nombre = $request->get('txt-usuario');
        $datos['usuarios'] = null;
        if ($nombre != null) {
            $datos['usuarios'] = Usuario::where('nombre', 'like', "%$nombre%")->paginate(10);
        } else {
            $datos['usuarios'] = Usuario::paginate(10);
        }
        return view('admin/usuario-lista', $datos);
    }

    public function getUsuario(Request $request)
    {
        $request->user()->authorizeRoles(['ADMINISTRADOR']);
        $data = DB::table('roles')->whereNotIn('id', ['CONEXION'])->get();
        $roles = $data->pluck('id', 'id');
        if ($request->get('usuario') != null) {
            $usuario = $request->get('usuario');
            $persona = $request->get('persona');
            $rol = $request->get('rol');
            return view('admin/usuario-form')->with('roles', $roles)->with('usuario', $usuario)->with('persona', $persona)->with('rol', $rol);
        }
        return view('admin/usuario-form')->with('roles', $roles);
    }

    public function inactivar($id)
    {
        DB::table('usuarios')
            ->where('id', $id)
            ->update(['estado' => 'I']);

        return Redirect::route('usuario-lista')->with('mensaje', 'Usuario Inactivado');
    }

    public function activar($id)
    {
        DB::table('usuarios')
            ->where('id', $id)
            ->update(['estado' => 'A']);

        return Redirect::route('usuario-lista')->with('mensaje', 'Usuario Activado');
    }

    public function editar($id)
    {
        $usuario = DB::table('usuarios')->where('id', $id)->first();
        $persona = DB::table('personas')->where('id', $usuario->id_persona)->first();
        $rol = DB::table('usuario_rol')->where('usuario_id', $id)->whereNotIn('role_id', ['CONEXION'])->first();
        return Redirect::route('usuario-form', compact('usuario', 'persona', 'rol'));
    }

    public function guardarUsuario(Request $request)
    {
        $usuario = $request->get('id_usuario');
        error_log($usuario);
        $mensaje = '';
        if ($usuario != null) {
            $persona = $request->get('id_persona');
            DB::table('personas')
                ->where('id', $persona)
                ->update([
                    'nombre' => $request->get('nombre'),
                    'apellido' => $request->get('apellido'),
                    'numero_identificacion' => $request->get('cedula')
                ]);
            DB::table('usuarios')
                ->where('id', $usuario)
                ->update(['nombre' => $request->get('correo')]);

            $mensaje = 'Registro Actualizado';
        } else {
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

            DB::table('usuario_rol')->insertGetId(
                [
                    'role_id' => $request->get('rol'),
                    'usuario_id' => $idUsuario
                ]
            );

            DB::table('usuario_rol')->insertGetId(
                [
                    'role_id' => 'CONEXION',
                    'usuario_id' => $idUsuario
                ]
            );
            $mensaje = 'Usuario Creado';
        }


        return Redirect::route('usuario-lista')->with('mensaje', $mensaje);
    }
}
