<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'Citas';
    protected $primaryKey = 'id_Cita';
    protected $fillable = [
        'id_Calendario',
        'id_Cliente',
        'estado',
    ];
    public function calendario()
    {
        return $this->belongsTo(Calendario::class, 'id_Calendario');
    }
   
    public $timestamps = false;
}
