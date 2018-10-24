<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:5',
            'descricao' => 'required|min:5',
            'assunto' => 'required|min:5'

        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Campo Nome é obrigatorio',
            'descricao.required' => 'Campo Descrição é obrigatorio',
            'assunto.required' => 'Campo Assunto é obrigatorio',

            '*min' => 'Quantidade minima de caracteres e 5.'
        ];
    }
}
