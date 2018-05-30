<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperacaoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'id_usuario' => 'required|integer|exists:users,id',
            'id_tipo_operacao' => 'required|integer|exists:tipo_operacaos,id'
        ];
    }
}
