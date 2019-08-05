<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrdenPlato;
use App\Plato;
use App\Orden;

class ordenplatoController extends Controller
{
    public function show() {
        $tipids = OrdenPlato::all();
        return view('ordenplatoview',['msg' => '', 'tipids' => $tipids]);
    }

    public function show2() {
        $tipids = OrdenPlato::all();
        return view('ordenplatoview2',['msg' => '', 'tipids' => $tipids]);
    }

    public function store(Request $request) {
        $msg = "No fué posible crear el plato a la orden. Datos incompletos.";
        if ($request->get("codplato") && $request->get("numorden") && $request->get("cantidad")) {
            $plato = $request->get("codplato");
            $orden = $request->get("numorden");
            $cantidad = $request->get("cantidad");
            if ($plato != "" && $orden != "" && $cantidad != "") {
                
            	$cplato = Plato::find($plato);
            	$corden = Orden::find($orden);

            	if (isset($cplato) && isset($corden)) {
            		
            		$valor = $cplato->valor * $cantidad;
            		try {
	                    $bnom = new OrdenPlato;
	                    $bnom->codPlato = $plato;
	                    $bnom->numOrden = $orden;
	                    $bnom->cantidad = $cantidad;
	                    $bnom->valor = $valor;
	                    $bnom->save();
	                   
	                    $msg='La información se registró con éxito';

	                } catch (Exception $e) {
	                    $msg = $e->getMessage();
	                }
            	}else{
            		$msg = 'No fué posible registrar el plato a la orden. Verifique que haya escrito un código existente.';
            	}
            }
        }
        $tipids = OrdenPlato::all();
        return view('ordenplatoview',['msg' => $msg, 'tipids' => $tipids]);
    }

    public function actualizar(Request $request){
        $msg = "No fué posible actualizar el plato a la orden. Datos incompletos.";
        if ($request->get("id") && $request->get("codplato") && $request->get("numorden") && $request->get("cantidad")) {
            $id = $request->input('id');
            $plato = $request->input('codplato');
            $orden = $request->input('numorden');
            $cantidad = $request->input('cantidad');
            if ($id != "" && $plato != "" && $orden != "" && $cantidad != "") {

            	$cplato = Plato::find($plato);
            	$corden = Orden::find($orden);

            	if(isset($cplato) && isset($corden)){
            		
	                try {
	                    $or = OrdenPlato::find($id);
	                    if(isset($or)){
	                    	$valor = $cplato->valor * $cantidad;
	                        $or->codPlato = $plato;
	                    	$or->numOrden = $orden;
	                    	$or->cantidad = $cantidad;
	                    	$or->valor = $valor;
	                        $or->save();
	                       
	                        $msg='La información se actualizó con éxito';
	                    }else{
	                        $msg = "No fué posible actualizar. No existe.";
	                    }
	                } catch (Exception $e) {
	                    $msg = $e->getMessage();
	                }
                }else{
                	$msg = 'No fué posible actualizar el plato a la orden. Verifique que haya escrito un código existente.';
                }
            }
        $tipids = OrdenPlato::all();
        return view('ordenplatoview2',['msg' => $msg, 'tipids' => $tipids]);
    	}
    }
}
