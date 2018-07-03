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
            'categoria_produto' => 'required|min:1'
        ];
    }
    public function validationData()
    {
        $dados = $this->all();
        $dados['precoProduto'] = preg_replace("/[^0-9]/", "", $dados['precoProduto']);

        return $dados;
    }
}
