<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'letra_numero' => 'required',
            'nome' => 'required',
            'tipos_id' => 'required',
            'preco_compra' => 'required',
            'preco_venda' => 'required',
            'estoque' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'letra_numero.required' => 'O campo Categoria é obrigatório.',
            'nome.required' => 'O campo Nome é obrigatório.',
            'tipos_id.required' => 'O campo Tipo é obrigatório.',
            'preco_compra.required' => 'O campo Preço de compra é obrigatório.',
            'preco_venda.required' => 'O campo Preço Estimado de Venda é obrigatório.',
            'estoque.required' => 'O campo Estoque é obrigatório.',
        ];
}

}
