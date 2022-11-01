<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function __construct(private Endereco $model) {}

    public function me()
    {
        $user = auth('sanctum')->user();

        return Cliente::select('estado', 'cidade', 'bairro', 'rua', 'numero', 'cep')
            ->join('enderecos', 'enderecos.id', 'endereco_id')
            ->where('user_id', $user->id)
            ->first();
    }

    public function update(Request $request)
    {
        $user = auth('sanctum')->user();

        $cliente = Cliente::select('endereco_id')
            ->where('user_id', $user->id)
            ->first();

        $endereco = $this->model->find($cliente->endereco_id);

        return $endereco->update($request->all());
    }
}
