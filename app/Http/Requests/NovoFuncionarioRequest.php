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
            'Numero'                => 'required',
            'Bairro'                => 'required|string|min:5',
            'Estado'                => 'required|string|min:5',
            'Estado'                => 'required|string|min:2',
            'password'              => 'required|min:4|confirmed'
        ];
    }
    public function messages()
    {
        return [
            'name.required'                 =>  'O campo nome é obrigatório',
            'name.min'                      =>  'O campo nome deve ter no mínimo 5 caracteres',
            'name.string'                   =>  'O nome deve ser um conjunto de caracteres',
            'cpf.required'                  =>  'O campo CPF é obrigatório',
            'cpf.min'                       =>  'O CPF deve ter 11 caracteres',
            'cargo.required'                =>  'O campo cargo é obrigatório',
            'cargo.string'                  =>  'O campo cargo deve ser um conjunto de caracteres',
            'email.required'                =>  'O campo email é obrigatório',
            'email.email'                   =>  'O campo email deve conter um email válido',
            'DataDeNascimento'              =>  'O campo Data de Nascimento é obrigatório',
            'DataDeNascimento.date'         =>  'O campo Data de Nascimento deve conter uma data válida',
            'DataDeContratacao.date'        =>  'O campo Data de Contratação deve conter uma data válida',
            'DataDeContratacao.required'    =>  'O campo Data de Contratação é obrigatório',
            'Supervisor.required'           =>  'O campo Supervisor é obrigatório',
            'Supervisor.string'             =>  'O campo Supervisor deve conter um nome válido',
            'CEP.required'                  =>  'O campo CEP é obrigatório',
            'CEP.min'                       =>  'O campo CEP deve conter um CEP válido',
            'Rua.required'                  =>  'O campo Rua é obrigatório',
            'Rua.string'                    =>  'O campo Rua deve conter um nome válido',
            'Rua.min'                       =>  'O campo Rua deve conter no mínimo 5 caracteres',
            'Numero.required'               =>  'O campo Número é obrigatório',
            'Bairro.required'               =>  'O campo Bairro é obrigatório.',
            'Bairro.string'                 =>  'O campo Bairro deve conter um nome válido.',
            'Bairro.min'                    =>  'O campo Bairro deve conter no mínimo 5 caracteres',
            'Cidade.required'               =>  'O campo Cidade é obrigatório.',
            'Cidade.string'                 =>  'O campo Cidade deve conter um nome válido.',
            'Cidade.min'                    =>  'O campo Cidade deve conter no mínimo 5 caracteres',
            'Estado.required'               =>  'O campo Estado é obrigatório.',
            'Estado.string'                 =>  'O campo Estado deve conter um nome válido.',
            'Estado.min'                    =>  'O campo Estado deve conter no mínimo 2 caracteres',
            'password.required'             =>  'O campo Senha para acesso é obrigatório',
            'password.confirmed'            =>  'O campo Confirmar Senha não confere',
            'password.min'                  =>  'O campo Senha deve conter no mínimo 4 caracteres',
        ];
    }
    public function validationData()
    {
        $dados = $this->all();
        $dados['cpf'] = preg_replace("/[^0-9]/", "", $dados['cpf']);
        return $dados;
    }

}
