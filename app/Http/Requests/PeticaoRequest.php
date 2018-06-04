<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeticaoRequest extends FormRequest
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
            'titulo' => 'required',
            'texto' => 'required',
            'id_documento' => 'required',
            'id_tipo_peticao' => 'required',
            'id_parte_atendida' => 'required'
        ];
    }
}
