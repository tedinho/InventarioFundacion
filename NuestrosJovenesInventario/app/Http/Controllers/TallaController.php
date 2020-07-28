<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\Console\Input\Input;

class TallaController extends Controller
{
    
    public $lista;
    public $numeroPaginado = 10;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTallas(){
        $lista['talla'] = DB::table('talla')
        ->paginate($this->numeroPaginado);
        return view('admin.talla-lista', $lista);
    }
    public function getTallaForm(Request $request){
        $talla = $request->get('talla');
        return view('admin.talla-form')->with('talla',$talla);
    }

    
    public function inactivar($id_talla){
        $affected = DB::table('talla')
              ->where('id', $id_talla)
              ->update(['estado' => 'I']);
        return redirect()->route('talla-lista')->with('mensaje', 'Registro Desactivado');

    }
    public function activar($id_talla){
        $affected = DB::table('talla')
              ->where('id', $id_talla)
              ->update(['estado' => 'A']);
       return redirect()->route('talla-lista')->with('mensaje', 'Registro Activado');

    }
    public function editarTalla($id_talla){ // go view
        $talla = DB::table('talla')
        ->where('id', $id_talla)
        ->first();
        
        return redirect()->route('talla-form', compact('talla'));
    }

    public function buscar(Request $request)
    {
        $nombre = $request->get('txt-talla');
        $lista['talla'] = DB::table('talla')->where('nombre', 'like', "%$nombre%")->paginate($this->numeroPaginado);
        return view('admin.talla-lista', $lista);
    }
    public function guardarTalla(Request $request){
        $id = $request->get('id_talla');
        if($id!=null){
            DB::table('talla')
                ->where('id', $id)
                ->update([
                 'siglas' => $request->input('siglas'),   
                 'nombre' => $request->input('nombre'),
                 'estado'=> $request->input('estado'),
                
                   ]);
        } else {
            $existRow = DB::table('talla')->where('nombre', $request->input('nombre'))->first();
            if(empty($existRow)){
                try {
                    DB::table('talla')->insert(
                        [
                         'siglas' => $request->input('siglas'),   
                         'tipo' => $request->input('tipo'),
                         'estado'=>'A' ]
                    );
                } catch (\Throwable $thr) {
                    return redirect()->route('talla-lista')->with('error', 'Error en server.');
                }
            }else{
                return redirect()->back()->with('error', 'Error no se creo la Talla, ya existe un registro con el mismo .');

            }
            
        }
        return redirect()->route('talla-lista')->with('mensaje', 'Talla creada correctamente');

    }

}
