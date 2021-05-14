<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCliente extends FormRequest
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
            'razao_social' => ['required','min:3','max:255'],
            'nm_fantasia' => ['required','min:3','max:255'],
            'cnpj' => ['required', 'digits:14', 'numeric'],
            'endereco' => ['required','min:3','max:1000'],
            'email' => ['required','min:3','max:255'],
            'telefone' => ['required', 'min:5','max:14'],
            'nm_responsavel' => ['required','min:3','max:255'],
            'cpf' => ['required', 'digits:11', 'numeric'],
            'celular' => ['required', 'min:5','max:14'],
            'id_usuario'=> ['required']
        ];
    }
}
