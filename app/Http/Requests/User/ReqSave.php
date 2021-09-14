<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ReqSave extends FormRequest
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
            'user.cpf'      =>  'bail|required|max:20|unique:users,cpf',
            'user.email'    =>  'bail|required|email|unique:users,email',
            'user.password' =>  'bail|required|min:5|confirmed',
            'user.group_id' =>  'bail|required',

            'entity.name'           =>  'bail|required|max:191',
            'entity.company_name'   =>  'bail|required|max:400',
            'entity.cnpj'           =>  'bail|nullable|max:20|unique:entities,cnpj',
        ];
    }

    public function messages()
    {
        return [
            'user.email.unique'         =>  'Este E-MAIL já esta sendo utilizado',
        ];
    }
}
