<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    // Laravel usa "password" por padrão, precisamos indicar que é "senha"
    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function contas()
    {
        return $this->hasMany(Contas::class, 'usuario_id');
    }

}
