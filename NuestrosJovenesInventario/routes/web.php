<?php

use Illuminate\Support\Facades\Route;

//para autentificacion
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('index', 'IndexController@index')->name('index');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


//logica usuarios
Route::get('admin/usuario-lista', 'UsuarioController@inicio')->name('usuario-lista');
Route::get('admin/usuario-form', 'UsuarioController@getUsuario')->name('usuario-form');
Route::post('admin/usuario-lista', 'UsuarioController@buscar')->name('buscar-usuario');
Route::post('guardarUsuario', 'UsuarioController@guardarUsuario')->name('guardarUsuario');
Route::post('inactivarUsuario/{id}', 'UsuarioController@inactivar')->name('inactivarUsuario');
Route::post('activarUsuario/{id}', 'UsuarioController@activar')->name('activarUsuario');
Route::get('editarUsuario/{id}', 'UsuarioController@editar')->name('editarUsuario');


// CRUD DE PERSONAS
Route::get('admin/person-lista', 'PersonaController@getPersonas')->name('persons-list');
Route::get('admin/person-form', 'PersonaController@getPersonForm')->name('person-form');
Route::post('guardarPersona', 'PersonaController@guardarPersona')->name('guardarPersona');
Route::post('inactivarPersona/{id}', 'PersonaController@inactivar')->name('inactivarPersona');
Route::post('activarPersona/{id}', 'PersonaController@activar')->name('activarPersona');

Route::get('editar/{id}', 'PersonaController@editar')->name('editarPersona');
Route::post('admin/person-lista', 'PersonaController@buscar')->name('buscar-persona');


// CRUD TIPOS DE PRENDA
Route::get('admin/tipo-prenda-lista', 'PrendaController@inicio')->name('tipo-prenda-lista');
Route::get('admin/tipo-prenda-form', 'PrendaController@getTipoPrendaForm')->name('tipo-prenda-form');
Route::post('guardarTipoPrenda', 'PrendaController@guardarTipoPrenda')->name('guardarTipoPrenda');

Route::post('inactivarTipoPrenda/{id}', 'PrendaController@inactivar')->name('inactivarTipoPrenda');
Route::post('activarTipoPrenda/{id}', 'PrendaController@activar')->name('activarTipoPrenda');

Route::get('editarTipoPrenda/{id}', 'PrendaController@editarTipoPrenda')->name('editarTipoPrenda');
Route::post('admin/tipo-prenda-lista', 'PrendaController@buscar')->name('buscar-tipo-prenda');

//CRUD - TALLAS
Route::get('admin/talla-lista', 'TallaController@getTallas')->name('talla-lista');
Route::get('admin/talla-form', 'TallaController@getTallaForm')->name('talla-form');
Route::post('guardarTalla', 'TallaController@guardarTalla')->name('guardarTalla');

Route::post('inactivartalla/{id}', 'TallaController@inactivar')->name('inactivarTalla');
Route::post('activartalla/{id}', 'TallaController@activar')->name('activarTalla');

Route::get('editarTalla/{id}', 'TallaController@editarTalla')->name('editarTalla');
Route::post('admin/talla-lista', 'TallaController@buscar')->name('buscar-talla');

//CRUD - GENERO
Route::get('admin/genero-lista', 'GeneroController@getGenero')->name('genero-lista');
Route::get('admin/genero-form', 'GeneroController@getGeneroForm')->name('genero-form');
Route::post('guardarGenero', 'GeneroController@guardarGenero')->name('guardarGenero');

Route::post('inactivarGenero/{id}', 'GeneroController@inactivar')->name('inactivarGenero');
Route::post('activarGenero/{id}', 'GeneroController@activar')->name('activarGenero');

Route::get('editarGenero/{id}', 'GeneroController@editarGenero')->name('editarGenero');
Route::post('admin/genero-lista', 'GeneroController@buscar')->name('buscar-genero');
