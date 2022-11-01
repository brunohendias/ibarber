<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome','email','endereco_id','user_id'
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
