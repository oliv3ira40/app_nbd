<?php

namespace App\Http\Requests\UserRegister;

use Illuminate\Foundation\Http\FormRequest;

class ReqSaveFinalizeRegistration extends FormRequest
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
        dd();
        return [
            'cnpj'              =>  'bail|required|max:20',
            'name'              =>  isset($this['name']) ? 'bail|required|max:191' : '',
            'company_name'      =>  isset($this['company_name']) ? 'bail|required|max:400' : '',
            'foundation_date'   =>  isset($this['foundation_date']) ? 'bail|required' : '',
            'type_of_entity_id' =>  'required',
        ];
    }
}
