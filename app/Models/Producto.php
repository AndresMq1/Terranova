<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombreProducto',
        'descripcion',
        'precioProducto',
        'cod_tipop_fk',
        'cod_vendedor_fk',
    ];

    public function vendedor(){
        return $this->belongsTo(User::class,'cod_vendedor_fk');
    }

    public function tipoProducto(){
        return $this->belongsTo(Tipop::class, 'cod_tipop_fk');
    }
}
