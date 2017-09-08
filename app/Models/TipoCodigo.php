<?php

namespace aerows\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCodigo extends Model
{
    //
    protected $table = 'Codigos';
    protected $primaryKey = 'CODIGO';
    public $incrementing = false;

    function detalleLiquidacion(){
        return $this->hasMany('IPSLiquidacion\Models\DetalleLiquidacion','CODIGO');
    }

}
