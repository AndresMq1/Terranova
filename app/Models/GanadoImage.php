<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GanadoImage extends Model
{
    protected $table = 'ganado_images';
    protected $primaryKey = 'id';
    protected $fillable = [
        'path',
        'ganado_id_fk',
    ];
}
