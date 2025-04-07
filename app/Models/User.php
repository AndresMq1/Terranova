<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'apellido',
        'documento',
        'telefono',
        'cod_tipo_fk',
        'cod_tipod_fk',
        'email',
        'password',
        'nacimiento',
    ];

    public function tipou(){
        return $this->belongsTo(Tipou::class,'cod_tipo_fk','cod_tipo');
    }

    public function tipod(){
        return $this->belongsTo(Tipod::class,'cod_tipod_fk','cod_tipod');
    }

    public function productos(){
        return $this->hasMany(Producto::class, 'cod_vendedor_fk');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
