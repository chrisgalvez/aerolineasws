<?php

namespace aerows\Models;

use Illuminate\Database\Eloquent\Model;

class TipoBeneficio extends Model
{
    protected $table = 'Beneficio';
    protected  $primaryKey = 'Cod';

    public function beneficios(){
        return $this->hasMany("aerosws\Models\Beneficio","COD_BENEFICIO");
    }
}
