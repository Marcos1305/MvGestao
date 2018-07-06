<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NovoFuncionarioRequest extends FormRequest
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
            'name'                  => 'required|min:5|string',
            'cpf'                   => 'required|min:11',
            'cargo'                 => 'required|string',
            'email'                 => 'required|email',
            'DataDeNascimento'      => 'required|date',
            'DataDeContratacao'     => 'required|date',
            'Supervisor'            => 'required|string',
            'CEP'                   => 'required|min:8',
            'Rua'                   => 'required|string|min:5',
            'Numero'                => 'required|numeric',
            'Bairro'                => 'required|string|min:5',
            'Cidade'                => 'required|string|min:5',
            'Estado'                => 'required|string|min:2',
            'password'              => 'required|min:4|confirmed'
        ];
    }
    public function validationData()
    {
        $dados = $this->all();
        $dados['cpf'] = preg_replace("/[^0-9]/", "", $dados['cpf']);
        return $dados;
    }

}
