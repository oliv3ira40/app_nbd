<?php

namespace App\Http\Requests\Peoples\Employee;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Admin\User;

class ReqUpdate extends FormRequest
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
        $editable_user = User::find($this->user_id);

        return [
            'first_name'    => 'bail|required|max:190',
            'email'         => ($editable_user->email == $this->email) ? 'bail|required|email' : 'bail|required|email|unique:users,email',
            'cpf'           => ($editable_user->cpf == $this->cpf) ? 'bail|nullable|max:20' : 'bail|nullable|max:20|unique:users,cpf',
            'password'      => 'bail|nullable|min:5|confirmed',
        ];
    }
    public function messages() {
        return [
            'cpf.unique' => 'Esse CPF já está sendo utilizado',
            'email.unique' => 'Esse e-mail já está sendo utilizado',
        ];
    }
}
