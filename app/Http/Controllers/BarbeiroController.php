<?php

namespace App\Http\Controllers;

use App\Models\Barbeiro;
use App\Models\Cliente;

class BarbeiroController extends Controller
{
    public function __construct(private Barbeiro $model) {}

    public function index()
    {
        $user = auth('sanctum')->user()->id;

        $cliente = Cliente::select('cidade')
            ->where('user_id', $user)
            ->join('enderecos', 'enderecos.id', 'endereco_id')
            ->first();

        if (is_null($cliente)) return [];

        return $this->model
            ->select('barbeiros.id', 'nome', 'cidade', 
                'bairro', 'rua', 'numero', 'cep',
                'horario_inicio', 'horario_fim', 'semAgenda')
            ->join('enderecos', 'endereco_id', 'enderecos.id')
            //->where('cidade', $cliente->cidade)
            ->get();
    }
}
