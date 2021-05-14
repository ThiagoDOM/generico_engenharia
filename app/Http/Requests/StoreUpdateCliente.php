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
        //$id = $this->segment(2);


        return [
            //'title' => "required|min:3|max:160|unique:posts,title,{$id},id",
            'razao_social' => ['required','min:3','max:255'],
            'nm_fantasia' => ['required','min:3','max:255'],
            'cnpj' => ['required', 'min:14','max:14'],
            'endereco' => ['required','min:3','max:1000'],
            'email' => ['required','min:3','max:255'],
            'telefone' => ['required', 'min:5','max:14'],
            'nm_responsavel' => ['required','min:3','max:255'],
            'cpf' => ['required', 'min:11','max:11'],
            'celular' => ['required', 'min:5','max:14'],
            'id_usuario'=> ['required']
            //'nm_fantasia' => ['nullable','min:5','max:100'],
            //'image' => 'required|mimes:pdf,docx,doc|max:4096'
            //'image' => 'required|image'
        ];
    }
}
