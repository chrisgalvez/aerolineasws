<?php

namespace aerows\Models;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    //
    protected $primaryKey = 'CodLocalidad';
    protected $table='Localidades';

    public function beneficios(){
        return $this->hasMany('IPSLiquidacion\Models\Beneficio','CODLOCALIDAD');
    }

    public function provincia(){
        return $this->belongsTo('IPSLiquidacion\Models\Provincia','CodProvincia');
    }

}
