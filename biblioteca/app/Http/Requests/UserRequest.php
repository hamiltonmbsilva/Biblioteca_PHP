<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

            'name'=> 'required|min:5',
            'email'=> 'required|min:5',
            'password'=> 'required|min:5',
            'idade'=> 'required|min:1',
            'cpf'=> 'required|min:5',
            'rg'=> 'required|min:5'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo nome é obrigatorio',
            'email.required' => 'Campo email é obrigatorio',
            'password.required' => 'Campo senha é obrigatorio',
           'idade.required' => 'Campo idade é obrigatorio',
            'cpf.required' => 'Campo CPF é obrigatorio',
            'rg.required' => 'Campo RG é obrigatorio',
            '*min' => 'Quantidade minima de caracteres e 5.'
        ];
    }
}
