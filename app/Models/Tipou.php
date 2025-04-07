<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipou extends Model
{
    protected $table = 'terranovaLogin';
    protected $primaryKey = 'cod_tipo';
    protected $fillable = ['nom_tipo'];

    public function users()
    {
        return $this->hasMany(User::class, 'cod_tipo_fk', 'cod_tipo');
    }
}
