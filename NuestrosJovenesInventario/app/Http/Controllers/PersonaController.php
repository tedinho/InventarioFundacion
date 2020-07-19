<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    public $lista;

    public $numeroPaginado = 10;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPersonas(){
        $lista['personas'] = DB::table('personas')
        ->paginate($this->numeroPaginado);
        return view('admin.persons-lista', $lista);
    }
    public function getPersonForm(Request $request){
        $persona = $request->get('persona');
        return view('admin.persons-form')->with('persona',$persona);
    }
    public function guardarPersona(Request $request){
        $id = $request->get('id');
        if($id!=null){
            DB::table('personas')
                ->where('id', $id)
                ->update([
                 'nombre' =>  $request->input('nombre'),
                 'apellido' => $request->input('apellido'),
                 'numero_identificacion'=> $request->input('cedula'),
                
                   ]);
        } else {
            $existRow = DB::table('personas')->where('numero_identificacion', $request->input('cedula'))->first();
            if(empty($existRow)){
                try {
                    DB::table('personas')->insert(
                        ['nombre' =>  $request->input('nombre'),
                         'apellido' => $request->input('apellido'),
                         'numero_identificacion'=> $request->input('cedula'),
                         'estado'=>'A' ]
                    );
                } catch (\Throwable $th) {
                    return redirect()->route('persons-list')->with('error', 'Error en server.');
                }
            }else{
                return redirect()->back()->with('error', 'Error no se creo la persona, ya existe un registro con el mismo número de identificación.');

            }
            
        }
        return redirect()->route('persons-list')->with('mensaje', 'Persona creada correctamente');

    }

    public function inactivar($id_persona){
        $affected = DB::table('personas')
              ->where('id', $id_persona)
              ->update(['estado' => 'I']);
        return redirect()->route('persons-list')->with('mensaje', 'Registro Desactivado');

    }
    public function activar($id_persona){
        $affected = DB::table('personas')
              ->where('id', $id_persona)
              ->update(['estado' => 'A']);
       return redirect()->route('persons-list')->with('mensaje', 'Registro Activado');

    }

    public function editar($id_persona){ // go view
        $persona = DB::table('personas')
        ->where('id', $id_persona)
        ->first();
        
        return redirect()->route('person-form', compact('persona'));
    }

    public function buscar(Request $request)
    {
        $nombre = $request->get('txt-persona');
        $lista['personas'] = DB::table('personas')->where('nombre', 'like', "%$nombre%")->paginate($this->numeroPaginado);
        return view('admin.persons-lista', $lista);
    }
    
 
}
