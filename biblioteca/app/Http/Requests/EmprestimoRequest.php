<?php
/**
 * Created by PhpStorm.
 * User: Hamilton
 * Date: 02/11/2018
 * Time: 23:23
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class EmprestimoRequest extends FormRequest
{

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
            'dataEmprestimo' => 'required|min:8',
            'dataDevolucao' => 'required|min:8'

        ];
    }

    public function messages()
    {
        return [
            'dataEmprestimo.required' => 'Campo da Data do Emprestimo é obrigatorio',
            'dataDevolucao.required' => 'Campo da Data de Devolução é obrigatorio',

            '*min' => 'Quantidade minima de caracteres e 8.'
        ];
    }
}
