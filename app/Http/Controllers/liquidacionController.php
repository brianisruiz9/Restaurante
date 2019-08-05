<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\OrdenPlato;
use App\Plato;

class liquidacionController extends Controller
{
    public function show() {
        return view('liquidacionview',['msg' => '']);
    }

    public function store(Request $request) {
        $msg = "No fué posible liquidar la orden. Datos incompletos.";
        if ($request->get("numesa")) {
            $mesa = $request->get("numesa");
            if ($mesa != "") {
                try {
                	$cmesa = Orden::where("NumMesa","=",$mesa)->where("estado","=","N")->first();
                	if(isset($cmesa)){
                		$cmesa->estado = "C";
                		$cmesa->save();

                		$num = $cmesa->numero;
                		$orden=OrdenPlato::where("numOrden","=",$num);
                		$total=$orden->sum('valor');
                		$o=$orden->pluck('codplato');

                		$plato = Plato::find($o);
                		$p=$plato->pluck('nombre');
                		$msg='Platos: '.$p.' Total a pagar: $'.$total;
                	}else {
                		$msg = "La mesa no tiene una orden.";
                	}

                } catch (Exception $e) {
                	$msg = $e->getMessage();
                }
                
            }
        }
        
        return view('liquidacionview', ['msg' => $msg]);
    }
}
