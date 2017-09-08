<?php

namespace aerows\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleLiquidacion extends Model
{
    //
    public $table = 'Liquidacion';
    public $primaryKey = 'ID';

    public function liquidacion(){
        return $this->belongsTo('IPSLiquidacion\Models\Liquidacion','CONTROL');
    }

    function tipoCodigo(){
        return $this->belongsTo('IPSLiquidacion\Models\TipoCodigo','CODIGO');
    }
}
