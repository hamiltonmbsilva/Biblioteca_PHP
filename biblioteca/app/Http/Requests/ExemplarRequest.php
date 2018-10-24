<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExemplarRequest extends FormRequest
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
            'codigo'=> 'required|min:5',
//        'circular'=> 'required|min:5',
            'ano'=> 'required|min:4'

        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'Campo Codigo é obrigatorio',
//            'circular.required' => 'Campo Circular é obrigatorio',
            'ano.required' => 'Campo Ano é obrigatorio',

            '*min' => 'Quantidade minima de caracteres e 5.'
        ];
    }
}
