<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barbeiro extends Model
{
    protected $fillable = [
        'email','endereco_id','user_id'
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
