<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaRequest extends FormRequest
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
            'nome' => 'required|unique:marcas'
        ];
    }
    public function messages()
    {
        return [
        'required' => 'O nome da marca é obrigatório.',
        'unique' => 'Já existe uma marca com esse nome.',
    ];
    }
}
