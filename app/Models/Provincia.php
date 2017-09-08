<?php

namespace aerows\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    //
    protected $table='Provincias';
    protected $primaryKey='CodProvincia';

    public function localidades(){
        return $this->hasMany('IPSLiquidacion\Models\Localidad','CodProvincia');
    }
}
