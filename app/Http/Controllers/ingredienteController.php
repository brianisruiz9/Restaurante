<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingrediente;

class ingredienteController extends Controller
{
    public function show() {
        $tipids = Ingrediente::all();
        return view('ingredienteview',['msg' => '', 'tipids' => $tipids]);
    }

    public function show2() {
        $tipids = Ingrediente::all();
        return view('ingredienteview2',['msg' => '', 'tipids' => $tipids]);
    }

    public function store(Request $request) {
        $msg = "No fué posible crear el ingrediente. Datos incompletos.";
        if ($request->get("nombre") && $request->get("proveedor")) {
            $nom = $request->get("nombre");
            $pro = $request->get("proveedor");
            if ($nom != "" && $pro != "") {
                try {
                    $bnom = new Ingrediente;
                    $bnom->nombre = $nom;
                    $bnom->proveedor = $pro;
                    $bnom->save();
                   
                    $msg='La información se registró con éxito';

                } catch (Exception $e) {
                    $msg = $e->getMessage();
                }
            }
        }
        $tipids = Ingrediente::all();
        return view('ingredienteview',['msg' => $msg, 'tipids' => $tipids]);
    }

    public function actualizar(Request $request){
        $msg = "No fué posible actualizar el ingrediente. Datos incompletos.";
        if ($request->get("codigo") && $request->get("nombre") && $request->get("proveedor")) {
            $cod = $request->input('codigo');
            $nom = $request->input('nombre');
            $pro = $request->input('proveedor');
             if ($cod != "" && $nom != "" && $pro != "") {
                try {
                    $ingre = Ingrediente::find($cod);
                    if(isset($ingre)){
                        $ingre->nombre = $nom;
                        $ingre->proveedor = $pro;
                        $ingre->save();
                       
                        $msg='La información se actualizó con éxito';
                    }else{
                        $msg = "No fué posible actualizar el ingrediente. No existe.";
                    }
                } catch (Exception $e) {
                    $msg = $e->getMessage();
                }
             }
        }
        $tipids = Ingrediente::all();
        return view('ingredienteview2',['msg' => $msg, 'tipids' => $tipids]);
    }
}
