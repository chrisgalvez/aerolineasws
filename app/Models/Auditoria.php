<?php

namespace IPSLiquidacion\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Auditoria extends Model
{
    //
    protected $table = 'Audit';
    protected $primaryKey = 'Audit';
    protected $fillable = ['Control', 'Tipo', 'Origen', 'Usuario', 'Fecha', 'Hora', 'CodFam'];
    public $timestamps = false;

    public function beneficio()
    {
        return $this->belongsTo('IPSLiquidacion\Models\Beneficio', 'Control');
    }

    public function campos(){
        return $this->hasMany('IPSLiquidacion\Models\Campo','Audit');
    }

    public function getFechaAttribute(){
        return Carbon::instance(deEnteroAfecha($this->attributes["Fecha"]));
    }

    public function setFechaAttribute($fecha){
        $this->attributes['Fecha'] = deFechaAentero($fecha);
    }
}
