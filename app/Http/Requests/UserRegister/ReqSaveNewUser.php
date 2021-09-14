<?php

namespace App\Http\Requests\UserRegister;

use Illuminate\Foundation\Http\FormRequest;

class ReqSaveNewUser extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'entity.name'           =>  'bail|required|max:191',
            'entity.company_name'   =>  'bail|required|max:400',
            
            'user.cpf'      =>  'bail|required|max:20|unique:users,cpf',
            'entity.cnpj'   =>  'bail|nullable|max:20|unique:entities,cnpj',
            
            'user.email'    =>  'bail|required|email|unique:users,email',
            'user.password' =>  'bail|required|min:5|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'user.email.unique'         =>  'Este E-MAIL já esta sendo utilizado',
        ];
    }
}
