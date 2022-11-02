<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendenteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'data'          => 'date|after_or_equal:date',
            'cliente_id'    => 'required|numeric|exists:clientes,id',
            'barbeiro_id'   => 'required|numeric|exists:barbeiros,id',
        ];
    }
}