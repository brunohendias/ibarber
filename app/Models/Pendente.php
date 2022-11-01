<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendente extends Model
{
    protected $fillable = [
        'data', 'cliente_id', 'barbeiro_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
