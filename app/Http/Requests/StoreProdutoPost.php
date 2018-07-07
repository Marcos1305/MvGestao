<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreProdutoPost extends FormRequest
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
            'nomeProduto'       => 'required|string|min:4|max:30',
            'codigoProduto'     => 'required|numeric',
            'precoProduto'      => 'required|numeric',
            'descricaoProduto'  => 'required|min:10',
            'categoria_produto' => 'required',
            'estoque'           => 'required|numeric|min:0'
        ];
    }
    public function messages()
    {
        return[
            'nomeProduto.required'          => 'Nome do produto é obrigatório',
            'nomeProduto.min'               => 'Nome do produto deve ter no minimo 4 caracteres.',
            'nomeProduto.max'               => 'Nome do produto deve ter no máximo 30 caracteres.',
            'codigoProduto.required'        => 'Código do produto é obrigatório',
            'codigoProduto.numeric'         => 'Código do produto deve ser numérico',
            'precoProduto.required'         => 'Preço do produto é obrigatório',
            'precoProduto.numeric'          => 'Preço do produto deve ser um valor numérico',
            'descricaoProduto.required'     => 'Descrição do produto é obrigatório',
            'descricaoProduto.min'          => 'Descrição do produto deve ter no mínimo 10 caracteres',
            'categoria_produto.required'    => 'O produto deve pertencer no mínimo a 1 departamento',
            'estoque.required'              => 'O campo estoque é obrigatório.',
            'estoque.numeric'               => 'O campo estoque deve ser um valor numérico',
            'estoque.min'                   => 'O campo estoque não pode ser valor negativo. '
        ];
    }
    public function validationData()
    {
        $dados = $this->all();
        $dados['precoProduto'] = preg_replace("/[^0-9]/", "", $dados['precoProduto']);

        return $dados;
    }
}
