<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contas extends Model
{
    use HasFactory;

    protected $fillable = ['nome_conta', 'valor_conta', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }
}
