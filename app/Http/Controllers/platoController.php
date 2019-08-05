<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plato;

class platoController extends Controller
{
    public function show() {
        $tipids = Plato::all();
        return view('platoview',['msg' => '', 'tipids' => $tipids]);
    }

    public function store(Request $request) {
        $msg = "No fué posible crear el plato. Datos incompletos.";
        if ($request->get("nombre") && $request->get("valor")) {
            $nom = $request->get("nombre");
            $valor = $request->get("valor");
            if ($nom != "" && $valor != "") {
                try {
                    $bnom = new Plato;
                    $bnom->nombre = $nom;
                    $bnom->valor = $valor;
                    $bnom->save();
                   
                    $msg='La información se registró con éxito';

                } catch (Exception $e) {
                    $msg = $e->getMessage();
                }
            }
        }
        $tipids = Plato::all();
        return view('platoview',['msg' => $msg, 'tipids' => $tipids]);
    }

    public function show2() {
        $tipids = Plato::all();
        return view('platoview2',['msg' => '', 'tipids' => $tipids]);
    }

    public function actualizar(Request $request){
        $msg = "No fué posible actualizar el plato. Datos incompletos.";
        if ($request->get("codigo") && $request->get("nombre") && $request->get("valor")) {
            $cod = $request->input('codigo');
            $nom = $request->input('nombre');
            $valor = $request->input('valor');
             if ($cod != "" && $nom != "" && $valor != "") {
                try {
                    $ingre = Plato::find($cod);
                    if(isset($ingre)){
                        $ingre->nombre = $nom;
                        $ingre->valor = $valor;
                        $ingre->save();
                       
                        $msg='La información se actualizó con éxito';
                    }else{
                        $msg = "No fué posible actualizar el plato. No existe.";
                    }
                } catch (Exception $e) {
                    $msg = $e->getMessage();
                }
             }
        }
        $tipids = Plato::all();
        return view('platoview2',['msg' => $msg, 'tipids' => $tipids]);
    }
}
