<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terreno extends Model
{
    protected $table = 'terreno';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tamanoTerreno',
        'ubicacionTerreno',
        'tipoSuelo',
        'tipografiaTerreno',
        'fuentesAgua',
        'producto_id_fk',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id_fk');
    }

    public function imagenes()
    {
        return $this->hasMany(TerrenoImage::class, 'terreno_id_fk');
    }
}
