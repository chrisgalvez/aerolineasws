<?php

namespace aerows\Models;

use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    //
    protected $table = 'Campos';
    protected $fillable = ['Audit','Campo','Valor'];
    protected $primaryKey = 'Id';
    public $timestamps = false;

    public function auditoria(){
        return $this->belongsTo('IPSLiquidacion\Models\Auditoria','Audit');
    }
}
