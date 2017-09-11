<?php

namespace aerows\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Redis\Database;
use aerows\Models;

class Liquidacion extends Model
{
    protected $table = 'DatosAfiliado';
    protected $primaryKey = 'CONTROL';
    public $timestamps = false;

    public function detalle(){
        return $this->hasMany(Models\DetalleLiquidacion::class,'CONTROL');
    }

    public function getLiquidacionAttribute(){
        return $this->connection;
    }

    function getBrutoAttribute(){
        $suma = $this->detalle()->whereHas("tipoCodigo", function($query){ $query->where('TIPO','=','C'); })->sum("MONTO");

        return $this->BENEFICIO + $suma;
    }

    function getDescuentosAttribute(){
        $suma = $this->detalle()->whereHas("tipoCodigo", function($query){ $query->where('TIPO','=','D'); })->sum("MONTO");
        return $suma;

    }

    function getLiquidoAttribute(){
                return $this->Bruto - $this->Descuentos;

    }
}
