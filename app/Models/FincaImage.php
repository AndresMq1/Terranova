<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FincaImage extends Model
{
    use HasFactory;
    protected $table = 'finca_images';
    protected $primaryKey = 'id';
    protected $fillable = [
        'path',
        'finca_id_fk'
    ];

    public function finca(){
        return $this->belongsTo(Finca::class,'finca_id_fk');
    }
}
