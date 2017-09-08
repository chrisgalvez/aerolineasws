<?php

namespace aerows\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public $connection = 'usuarios';
    public $table = 'Grupos';
    public $fillable = [ 'Nombre', 'Descripcion'];
    protected $primaryKey = 'Grupo';

    function usuarios()
    {
        return $this->hasMany('IPSLiquidacion\Models\Usuario','Grupo');
    }

}
