<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'estado', 'cidade', 'bairro',
        'rua', 'numero', 'cep'
    ];

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function barbeiro()
    {
        return $this->hasOne(Barbeiro::class);
    }
}
