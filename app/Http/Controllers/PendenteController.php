<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pendente;
use App\Models\Agendamento;
use App\Http\Requests\PendenteRequest;
use Illuminate\Support\Facades\DB;

class PendenteController extends Controller
{
    private string $today = 'Y-m-d';

    public function __construct(private Pendente $model) {}

    public function me()
    {
        $user = auth('sanctum')->user()->id;

        $cliente = Cliente::select('id')
            ->where('user_id', $user)
            ->first();

        return is_null($cliente)
            ? [] 
            : $this->model->select('pendentes.id', 'data',
                'nome', DB::raw('agendamentos.id agendado'))
                ->join('barbeiros', 'barbeiro_id', 'barbeiros.id')
                ->leftJoin('agendamentos', 'pendente_id', 'pendentes.id')
                ->where('cliente_id', $cliente->id)
                ->whereRaw('data > '.date($this->today))
                ->get();
    }
    
    public function store(PendenteRequest $request)
    {
        $user = auth('sanctum')->user()->id;

        $cliente = Cliente::select('id')
            ->where('user_id', $user)
            ->first();

        if ($cliente && $cliente->id == $request->cliente_id) {
            $pendentes = $this->model
                ->select('pendentes.id')
                ->where('cliente_id', $cliente->id)
                ->whereRaw('data > '.date($this->today))
                ->get();
            
            $jaPossuiAgendamento = Agendamento::whereIn('pendente_id', $pendentes)
                ->count();

            if ($jaPossuiAgendamento > 0) {
                return null;
            }

            $data = $request->data;
            if (!$data) $data = date('Y-m-d H:m:s');

            if ($pendentes->count() < 3) {
                Pendente::create([
                    'data' => $data,
                    'barbeiro_id' => $request->barbeiro_id,
                    'cliente_id' => $request->cliente_id
                ]);
            }
        }
    }
}
