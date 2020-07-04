<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Opcion extends Model
{

    protected $table = 'opciones';

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'opciones_roles', 'id_opcion', 'id_rol');
    }

    public static function traerOpcionesPorRol()
    {
        $opcion = new Opcion();
        return $opcion->opcionesPorRoles()->toArray();
    }

    public function opcionesPorRoles()
    {
        $opciones = DB::table('opciones')->distinct()
            ->join('opciones_roles', 'opciones.id', '=', 'opciones_roles.id_opcion')
            ->join('roles', 'roles.id', '=', 'opciones_roles.id_rol')
            ->select('opciones.*')->whereIn('id_rol', session()->get('roles'))
            ->get();
        return $opciones;
    }
}
