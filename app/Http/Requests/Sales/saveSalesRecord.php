<?php

namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;

class saveSalesRecord extends FormRequest
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
            'sales.*.value'                     =>  'bail|required',
            'sales.*.purchase_date'             =>  'bail|required',
            'sales.*.specifier_id'              =>  'bail|required|not_in:null',
            'sales.*.cpf_or_cnpj_client'        =>  'bail|required',
        ];
    }
}
