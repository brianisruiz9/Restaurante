<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlatoIngrediente;
use App\Plato;
use App\Ingrediente;

class platoIngredienteController extends Controller
{
    public function show() {
        $tipids = PlatoIngrediente::all();
        return view('platoingredienteview',['msg' => '', 'tipids' => $tipids]);
    }

    public function show2() {
        $tipids = PlatoIngrediente::all();
        return view('platoingredienteview2',['msg' => '', 'tipids' => $tipids]);
    }

    public function store(Request $request) {
        $msg = "No fué posible crear ingrediente al plato. Datos incompletos.";
        if ($request->get("codplato") && $request->get("codingrediente") && $request->get("cantidad")) {
            $plato = $request->get("codplato");
            $ingrediente = $request->get("codingrediente");
            $cantidad = $request->get("cantidad");
            if ($plato != "" && $ingrediente != "" && $cantidad != "") {
                
            	$cplato = Plato::find($plato);
            	$cingre = Ingrediente::find($ingrediente);

            	if (isset($cplato) && isset($cingre)) {
            		
            		try {
	                    $bnom = new PlatoIngrediente;
	                    $bnom->codPlato = $plato;
	                    $bnom->codIngrediente = $ingrediente;
	                    $bnom->cantidad = $cantidad;
	                    $bnom->save();
	                   
	                    $msg='La información se registró con éxito';

	                } catch (Exception $e) {
	                    $msg = $e->getMessage();
	                }
            	}else{
            		$msg = 'No fué posible registrar los ingredientes al plato. Verifique que haya escrito un código existente.';
            	}
            }
        }
        $tipids = PlatoIngrediente::all();
        return view('platoingredienteview',['msg' => $msg, 'tipids' => $tipids]);
    }

    public function actualizar(Request $request){
        $msg = "No fué posible actualizar el ingrediente al plato. Datos incompletos.";
        if ($request->get("id") && $request->get("codplato") && $request->get("codingrediente") && $request->get("cantidad")) {

        	$id = $request->input('id');
            $plato = $request->input('codplato');
            $ingrediente = $request->input('codingrediente');
            $cantidad = $request->input('cantidad');
             if ($id != "" && $plato != "" && $ingrediente != "" && $cantidad != "") {

                try {
                    $ingre = PlatoIngrediente::find($id);
                    $cplato = Plato::find($plato);
            		$cingre = Ingrediente::find($ingrediente);

                    if(isset($ingre) && isset($cplato) && isset($cingre)){
                        $ingre->codPlato = $plato;
                        $ingre->codIngrediente = $ingrediente;
                        $ingre->cantidad = $cantidad;
                        $ingre->save();
                       
                        $msg='La información se actualizó con éxito';
                    }else{
                        $msg = "No fué posible actualizar. Verifique que haya escrito un código existente.";
                    }
                } catch (Exception $e) {
                    $msg = $e->getMessage();
                }
             }
        }
        $tipids = PlatoIngrediente::all();
        return view('platoingredienteview2',['msg' => $msg, 'tipids' => $tipids]);
    }

}
