<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function __construct(private Agendamento $model) {}

    public function cliente()
    {
        $user = auth('sanctum')->user()->id;

        $cliente = Cliente::select('id')
            ->where('user_id', $user)
            ->first();

        return is_null($cliente)
            ? [] 
            : $this->model->select('agendamentos.id','pendente_id','data','nome')
                ->join('pendentes', 'pendente_id', 'pendentes.id')
                ->join('barbeiros', 'barbeiro_id', 'barbeiros.id')
                ->where('cliente_id', $cliente->id)
                ->get();
    }

    public function barbeiroAgenda(Request $request)
    {
        return $this->model
            ->select('data')
            ->join('pendentes', 'pendentes.id', 'pendente_id')
            ->where('barbeiro_id', $request->barbeiro_id)
            ->whereRaw("data like '$request->date%'")
            ->get();
    }
}
