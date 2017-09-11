<?php

namespace aerows\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use aerows\Models;
use IPSLiquidacion\Models\Auditoria;

class Beneficio extends Model
{
    //
    protected $table = 'DatosAfiliado';
    protected $dates = [];
    protected $fillable = ['PLLA', 'ORDEN', 'AFILIADO', 'RESOLUCION', 'NOMBRE', 'DIRECCION', 'SEXO', 'TIPO_DOC',
        'NRO_DOCUMENTO', 'CUIL', 'CLASE', 'EXPEDIENTE', 'COD_BENEFICIO', 'BENEFICIO', 'OBRA_SOCIAL', 'TOPE',
        'SUCESOR', 'NROCTACTE', 'SITRAJ', 'LETRA', 'HABILITADO', 'BORRADO', 'CODLOCALIDAD', 'CESE', 'Res932',
        'NROCTACTENACION', 'CalleNom', 'CalleNum', 'CallePiso', 'Depto', 'CBU', 'FNac', 'upsize_ts', 'Movilidad',
        'MovilFUM', 'Cautelar', 'Motivo', 'ECivil', 'AdicionalPlus', 'FechaAlta'];
    protected $primaryKey = 'CONTROL';
    protected $hidden = [ "upsize_ts", "nombre", "sucesor" ];
    public $timestamps = false;

    public function tipo()
    {
        return $this->belongsTo(Models\TipoBeneficio::class, 'COD_BENEFICIO', 'Cod');
    }

    public function reparticion()
    {
        return $this->belongsTo(Models\Reparticion::class, 'LETRA');
    }

    public function localidad()
    {
        return $this->belongsTo(Models\Localidad::class, 'CODLOCALIDAD');
    }

    public function auditorias(){
        return $this->hasMany(Models\Auditoria::class,'Control');
    }

    public function liquidaciones(){
        return $this->hasMany(Models\Liquidacion::class,'CONTROL');
    }

    function getNombreCompletoAttribute(){
        if($this->TIPO->Tipo=='jub'){
            return $this->NOMBRE;
        }
        else
        {
            return $this->SUCESOR;
        }
    }

    function getCuilSinGuionesAttribute(){
        if (strlen($this->CUIL)>12){
            return substr($this->CUIL, 0,2) .
                substr($this->CUIL, 3,8) .
                substr($this->CUIL, 12,1);
        }else{
            return $this->CUIL;
        }

    }
}
