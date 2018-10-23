<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
            'titulo' => 'required|min:5',
            'ISBN' => 'required|min:5',
            'autores' => 'required|min:5',
            'edicao' => 'required|min:5',
            'editora' => 'required|min:5',
            'ano' => 'required|min:2',
            'assuntos' => 'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Campo Titulo é obrigatorio',
            'ISBN.required' => 'Campo ISBN é obrigatorio',
            'autores.required' => 'Campo Autores é obrigatorio',
            'edicao.required' => 'Campo Edição é obrigatorio',
            'editora.required' => 'Campo Editora é obrigatorio',
            'ano.required' => 'Campo Ano é obrigatorio',
            'assuntos.required' => 'Campo Assunto é obrigatorio',
            '*min' => 'Quantidade minima de caracteres e 5.'
        ];
    }
}
