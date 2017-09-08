<?php

namespace aerows\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'Usuarios';
    protected $connection = 'usuarios';

    public $primaryKey = 'Codigo';

    protected $fillable = [
        'Nombre', 'Apellido', 'Documento','FechaNac','Calle',
        'Numero','Telefono','Grupo','Usuario','Clave','ValidezClave'
    ];

    protected $hidden = [  ];

    public $timestamps = false;

    function grupos()
    {
        return $this->belongsTo('IPSLiquidacion\Models\Grupo','Grupo');
    }

    public function getAuthPassword()
    {
        return $this->Clave;
    }
}
