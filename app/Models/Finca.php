<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    protected $table = 'finca';
    protected $primaryKey = 'id';
    protected $fillable = [
        'espacioTotal',
        'espacioConstruido',
        'estratoFinca',
        'numHabitaciones',
        'numBanos',
        'ubicacionFinca',
        'producto_id_fk'
    ];
    public function imagenes(){
        return $this->hasMany(FincaImage::class,'finca_id_fk');
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id_fk');
    }
}
