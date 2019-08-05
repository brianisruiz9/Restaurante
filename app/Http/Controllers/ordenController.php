<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;

class ordenController extends Controller
{
    public function show() {
        $tipids = Orden::all();
        return view('ordenview',['msg' => '', 'tipids' => $tipids]);
    }

    public function show2() {
        $tipids = Orden::all();
        return view('ordenview2',['msg' => '', 'tipids' => $tipids]);
    }

    public function store(Request $request) {
        $msg = "No fué posible crear la orden. Datos incompletos.";

        if ($request->get("numesa")) {
            $mesa = $request->get("numesa");

            if ($mesa != "") {
            	$exorden = Orden::where("NumMesa","=",$mesa)->where("estado","=","N")->first();
            	if(isset($exorden)){
            		$msg='La mesa ya tiene una orden.';
            		
            	}else{
            		try {
	                    $bnom = new Orden;
	                    $bnom->fecha = date('o-m-d');
	                    $bnom->NumMesa = $mesa;
	                    $bnom->estado = "N";
	                    $bnom->save();
	                   
	                    $msg='La información se registró con éxito';

	                } catch (Exception $e) {
	                    $msg = $e->getMessage();
	                }
            	}
            }
        }
        $tipids = Orden::all();
        return view('ordenview',['msg' => $msg, 'tipids' => $tipids]);
    }

    public function actualizar(Request $request){
        $msg = "No fué posible actualizar la orden. Datos incompletos.";
        if ($request->get("numero") && $request->get("fecha") && $request->get("numesa")) {
            $numero = $request->input('numero');
            $fecha = $request->input('fecha');
            $numesa = $request->input('numesa');
            if ($numero != "" && $fecha != "" && $numesa != "") {

                $exorden = Orden::where("NumMesa","=",$numesa)->where("estado","=","N")->first();
            	if(isset($exorden)){
            		$msg='La mesa ya tiene una orden.';
            	}else{
	                try {
	                    $or = Orden::find($numero);
	                    if(isset($or)){
	                        $or->fecha = $fecha;
	                        $or->NumMesa = $numesa;
	                        $or->save();
	                       
	                        $msg='La información se actualizó con éxito';
	                    }else{
	                        $msg = "No fué posible actualizar La orden. No existe.";
	                    }
	                } catch (Exception $e) {
	                    $msg = $e->getMessage();
	                }
                }
            }
        $tipids = Orden::all();
        return view('ordenview2',['msg' => $msg, 'tipids' => $tipids]);
        }
	}
}
