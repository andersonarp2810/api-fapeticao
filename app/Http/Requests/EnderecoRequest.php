<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
            'dono_id' => 'required',
            'dono_type' => 'required',
            'uf' => 'required', 
            'cidade' => 'required',
            'bairro' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'complemento' => 'nullable'
        ];
    }
}
