<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\OrdenPlato;

class ventasController extends Controller
{
    public function show() {
        return view('ventaview',['msg' => '']);
    }

     public function store(Request $request) {
        $msg = "Datos incompletos.";
        if ($request->get("fecha")) {
            $fecha = $request->get("fecha");
            if ($fecha != "") {
                try {
                	$f = Orden::where("fecha","=",$fecha);
                	$num=$f->pluck('numero');
                	echo $num;
                	if ($num->isNotEmpty()) {
                		$orden=OrdenPlato::where("numOrden","=",$num);
                		$total=$orden->sum('valor');
                		$msg = "Total del dia: ".$total;
                	}else{
                		$msg = "No hay registros con esa fecha.";
                	}

                } catch (Exception $e) {
                	$msg = $e->getMessage();
                }
                
            }
        }
        
        return view('ventaview', ['msg' => $msg]);
    }
}
