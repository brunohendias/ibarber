<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = ['pendente_id'];

    public function pendencia()
    {
        return $this->belongsTo(Pendente::class);
    }
}
