<?php

namespace App\Http\Requests\Peoples\Employee;

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

    public function rules()
    {
        return [
            'first_name'    => 'bail|required|max:190',
            'email'         => 'bail|required|email|unique:users,email',
            'cpf'           => 'bail|nullable|max:20|unique:users,cpf',
            'password'      => 'bail|required|min:5|confirmed',
        ];
    }
    public function messages() {
        return [
            'cpf.unique' => 'Esse CPF já está sendo utilizado',
            'email.unique' => 'Esse e-mail já está sendo utilizado',
        ];
    }
}
