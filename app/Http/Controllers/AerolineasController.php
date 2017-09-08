<?php

namespace aerows\Http\Controllers;

use Illuminate\Http\Request;
use aerows\Http\Requests\PadronRequest;
use aerows\Models;

class AerolineasController extends Controller
{
    function index($cuil){
        if (strlen($cuil)==11)
        {
            $cuilquiones = substr($cuil, 0,2) . "-"
                . substr($cuil, 2,8) . "-"
                . substr($cuil, 10,1);
            $beneficios = Models\Beneficio::
                where("cuil","=",$cuilquiones)
                ->where("habilitado","=", "S")
                ->withCount("liquidaciones")
                ->limit(1)
                ->get();
        }else{
            return response(["status"=>400,"message"=>"Cuil incorrecto"],400);
        }
        if(count($beneficios) > 0 ){
            return response( ["status"=>200,
                "message"=>"",
                "beneficiario" => true,
                "nombre" => $beneficios[0]->nombrecompleto,
                "cuil"=>$beneficios[0]->cuil,
                "liquidaciones" => $beneficios->liquidaciones_count]);
        }else{
            return response(["status"=>200, "message"=>"", "beneficiario" => false]);
        }
    }
}
