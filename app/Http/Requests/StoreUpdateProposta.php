<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProposta extends FormRequest
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
        $rules = [
            'endereco' => ['required','min:3','max:1000'],
            'servico' => ['required','min:3','max:255'],
            'vl_total' => ['required','numeric'],
            'vl_sinal' => ['required','numeric'],
            'qt_parcelas' => ['required','numeric', 'min:1'],
            'vl_parcelas' => ['required','numeric','min:1'],
            'dt_inicio_pgto' => ['required','date'],
            'dt_parcelas' => ['required','numeric','min:1','max:31'],
            'documento' => ['required','mimes:pdf,docx,doc','max:4096'],
            'status' => ['required','boolean'],
            'id_cliente' => ['required'],
           ];

        if ($this->method() == 'PUT'){
            $rules['documento'] = ['nullable','mimes:pdf,docx,doc','max:4096'];
        }
        return $rules;
    }
}
