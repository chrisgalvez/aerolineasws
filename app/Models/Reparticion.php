<?php

namespace aerows\Models;

use Illuminate\Database\Eloquent\Model;

class Reparticion extends Model
{
    //
    protected $table = 'Reparticion';
    protected $primaryKey = 'Cod';

    public function beneficios(){
        return $this->hasMany('IPSLiquidacion\Models\Beneficio','Cod','LETRA');
    }


}
