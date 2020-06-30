<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        $credenciales = $this->validate(request(), [
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);


        if (Auth::attempt(['nombre' => $credenciales['nombre'], 'password' => $credenciales['password']])) {
            return redirect()->route('index');
        } else {
            return back()->withErrors([$this->username() => 'Usuario o contraseña incorrectos'])->withInput(request([$this->username()]));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function username()
    {
        return 'nombre';
    }
}
