<?php

namespace App\Http\Requests\Peoples\Professional;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Admin\User;

class saveFinalizeRegist extends FormRequest
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
        $editable_user = User::find($this->id);

        return [
            'user.first_name'       =>  'bail|required|max:191',
            'user.last_name'        =>  'bail|nullable|max:191',
            'user.email'            =>  ($editable_user->email == $this->user['email'] ) ? 'bail|required|email' : 'bail|required|email|unique:users,email',

            'professional.cnpj'     =>  'bail|required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'user.email.unique'=> 'Este E-MAIL já esta sendo utilizado',
            'user.cpf.unique'=> 'Este CPF já esta sendo utilizado',
        ];
    }
}
