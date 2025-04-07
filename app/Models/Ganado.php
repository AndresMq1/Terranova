<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganado extends Model
{
    protected $table = 'ganado';
    protected $primaryKey = 'id';
    protected $fillable = [
        'razaGanado',
        'edadGanado',
        'pesoGanado',
        'generoGanado',
        'tipoGanado',
        'ubicacionGanado',
        'vacunasGanado',
        'cantidadGanado',
        'producto_id_fk',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id_fk');
    }

    public function imagenes()
    {
        return $this->hasMany(GanadoImage::class, 'ganado_id_fk');
    }
}
