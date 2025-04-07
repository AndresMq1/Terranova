<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TerrenoImage extends Model
{
    protected $table = 'terreno_images';
    protected $primaryKey = 'id';
    protected $fillable = [
        'path',
        'terreno_id_fk',
    ];
}
