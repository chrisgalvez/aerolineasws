<?php

namespace aerows\Models;

use Illuminate\Database\Eloquent\Model;
use aerows\Models;

class DetalleLiquidacion extends Model
{
    //
    public $table = 'Liquidacion';
    public $primaryKey = 'ID';

    public function liquidacion(){
        return $this->belongsTo(Models\Liquidacion::class,'CONTROL');
    }

    function tipoCodigo(){
        return $this->belongsTo(Models\TipoCodigo::class ,'CODIGO');
    }
}
