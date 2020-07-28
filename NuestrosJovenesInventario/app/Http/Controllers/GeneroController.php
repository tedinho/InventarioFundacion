<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneroController extends Controller
{
    public $lista;
    public $numeroPaginado = 10;

    public function _construct()
    {
        $this->middleware('auth');
    }

    public function getGenero(){
        $lista['genero'] = DB::table('genero')
        ->paginate($this->numeroPaginado);
        return view('admin.genero-lista', $lista);
    }
    public function getGeneroForm(Request $request){
        $genero = $request->get('genero');
        return view('admin.genero-form')->with('genero',$genero);
    }

   
    public function inactivar($id_genero){
        $affected = DB::table('genero')
              ->where('id', $id_genero)
              ->update(['estado' => 'I']);
        return redirect()->route('genero-lista')->with('mensaje', 'Registro Desactivado');

    }
    public function activar($id_genero){
        $affected = DB::table('genero')
              ->where('id', $id_genero)
              ->update(['estado' => 'A']);
       return redirect()->route('genero-lista')->with('mensaje', 'Registro Activado');

    }
    public function editarGenero($id){ // go view
        $genero = DB::table('genero')
        ->where('id', $id)
        ->first();
        
        return redirect()->route('genero-form', compact('genero'));
    }

    public function buscar(Request $request)
    {
        $tipo = $request->get('txt-genero');
        $lista['genero'] = DB::table('genero')->where('tipo', 'like', "%$tipo%")->paginate($this->numeroPaginado);
        return view('admin.genero-lista', $lista);
    }
    public function guardarGenero(Request $request){
        $id = $request->get('id_genero');
        if($id!=null){
            DB::table('genero')
                ->where('id', $id)
                ->update([
                 'tipo' => $request->input('tipo'),
                 'estado'=> $request->input('estado'),
                
                   ]);
        } else {
            $existRow = DB::table('genero')->where('id', $request->input('id'))->first();
            if(empty($existRow)){
                try {
                    DB::table('genero')->insert(
                        [
                         'tipo' => $request->input('tipo'),
                         'estado'=>'A' ]
                    );
                } catch (\Throwable $th) {
                    return redirect()->route('genero-lista')->with('error', 'Error en server.');
                }
            }else{
                return redirect()->back()->with('error', 'Error no se creo la, ya existe un registro con el mismo .');

            }
            
        }
        return redirect()->route('genero-lista')->with('mensaje', 'Genero creada correctamente');

    }
}
