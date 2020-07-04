<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['CONEXION']);
        $rolesUsuario = $request->user()->roles()->get();
        $roles = new Collection();
        foreach ($rolesUsuario as $rol) {
            $roles->push($rol->pivot->role_id);
        }
        session(['roles' => $roles]);
        error_log($roles);
        return view('index');
    }
}
