<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipop extends Model
{
    protected $table = 'tipop';
    protected $primaryKey = 'cod_tipop';
    protected $fillable = ['nom_tipop'];
}
