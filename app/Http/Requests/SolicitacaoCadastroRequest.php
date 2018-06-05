<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SolicitacaoCadastroRequest extends FormRequest
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
            'login' => 'required',
            'senha' => 'required',
            'nome' => 'required',
            'pessoa_tipo' => ['required', Rule::in(['aluno', 'administrador', 'defensor', 'professor'])],
            'cadastro' => 'required'
        ];
    }
}
