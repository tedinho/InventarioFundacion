<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrendaController extends Controller
{
    public $lista;

    public $numeroPaginado = 10;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function inicio(Request $request)
    {

        $lista['tiposPrenda'] = DB::table('tipo_prenda')
        ->paginate($this->numeroPaginado);

        return view('admin/tipo-prenda-list',$lista);
    }
    public function getTipoPrendaForm(Request $request)
    {   
        $tipo_prenda = $request->get('tipo_prenda');
        return view('admin/tipo-prenda-form')->with('tipo_prenda',$tipo_prenda);
    
    }
    public function guardarTipoPrenda(Request $request)
    {
        $id = $request->get('id');
        if($id!=null){
            DB::table('tipo_prenda')
                ->where('id', $id)
                ->update([
                    'nombre' => $request->input('nombre'),
                   ]);
        } else {
            $existRow = DB::table('tipo_prenda')
            ->where('nombre',$request->input('nombre'))
            ->first();

            if(empty($existRow)){
               // INSERT
                DB::table('tipo_prenda')->insert(
                    ['nombre' =>  $request->input('nombre'),
                     'estado' => 'A',
                     ]
                );
            }else{
                return redirect()->back()->with('error', 'Error registro no creado, ya existe un tipo de prenda con el mismo nombre.');
            }
       
    }
        return redirect()->route('tipo-prenda-lista')->with('mensaje', 'Tipo de prenda creada correctamente');

    }
    public function inactivar($id_persona){
        $affected = DB::table('tipo_prenda')
              ->where('id', $id_persona)
              ->update(['estado' => 'I']);
        return redirect()->route('tipo-prenda-lista')->with('mensaje', 'Registro Desactivado');

    }
    public function activar($id_persona){
        $affected = DB::table('tipo_prenda')
              ->where('id', $id_persona)
              ->update(['estado' => 'A']);
       return redirect()->route('tipo-prenda-lista')->with('mensaje', 'Registro Activado');

    }

    public function editarTipoPrenda($id_tipoPrenda){ // go view

        $tipo_prenda = DB::table('tipo_prenda')
        ->where('id', $id_tipoPrenda)
        ->first();
        return redirect()->route('tipo-prenda-form', compact('tipo_prenda'));
    }

    public function buscar(Request $request)
    {
        $nombre = $request->get('txt-prenda');
        $lista['tiposPrenda'] = DB::table('tipo_prenda')->where('nombre', 'like', "%$nombre%")->paginate($this->numeroPaginado);
        return view('admin.tipo-prenda-list', $lista);
    }
}
