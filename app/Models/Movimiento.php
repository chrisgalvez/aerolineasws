<?php

namespace aerows\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    public $table = 'Liquidacion';
    public $primaryKey = 'ID';
    public $fillable = ["CODIGO","MONTO","FECHA"];
    public $timestamps = false;

    public function beneficio(){
        return $this->belongsTo('IPSLiquidacion\Models\Beneficio','CONTROL');
    }

    function codigo(){
        return $this->belongsTo('IPSLiquidacion\Models\Codigo','CODIGO');
    }

}
