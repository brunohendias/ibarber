<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function __construct(private Agendamento $model) {}

    public function index(Request $request)
    {
        return $this->model
            ->select('data')
            ->join('pendentes', 'pendentes.id', 'pendente_id')
            ->where('barbeiro_id', $request->barbeiro_id)
            ->whereRaw("data like '$request->date%'")
            ->get();
    }
}
