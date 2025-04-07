<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipod extends Model
{
    protected $table = 'terranovaLogin';
    protected $primaryKey = 'cod_tipod';
    protected $fillable = ['nom_tipod'];

    public function users()
    {
        return $this->hasMany(User::class, 'cod_tipod_fk', 'cod_tipod');
    }
}
