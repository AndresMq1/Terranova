<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $table = 'calendarios';

    protected $primaryKey = 'id_Calendario';

    protected $fillable = [
        'fechaDisponible',
        'horaInicio',
        'horaFin',
        'Ubicacion',
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_Calendario');
    }   

    public $timestamps = false;
}



        