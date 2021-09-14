<?php

namespace App\Http\Requests\Peoples\Professional;

use App\Models\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReq extends FormRequest
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
        // $editable_user = User::find($this->id);
        // $professional = $editable_user->Professional;

        return [
            // 'user.first_name'       =>  'bail|required|max:191',
            // 'user.last_name'        =>  'bail|nullable|max:191',
            // 'user.email'            =>  ($editable_user->email == $this->user['email'] ) ? 'bail|required|email' : 'bail|required|email|unique:users,email',
            // 'user.telephone'        =>  'bail|nullable|max:20',
            // 'user.cpf'              =>  ($editable_user->cpf == $this->user['cpf'] ) ? 'bail|required|max:191' : 'bail|required|max:191|unique:users,cpf',

            // 'professional.cnpj'     =>  ($professional->cnpj == $this->professional['cnpj'] ) ? 'bail|nullable|max:20' : 'bail|nullable|max:20|unique:professionals,cnpj',
        ];
    }

    public function messages()
    {
        return [
            'user.email.unique'=> 'Este E-MAIL já esta sendo utilizado',
            'user.cpf.unique'=> 'Este CPF já esta sendo utilizado',
            'professional.cnpj.unique'=> 'Este CNPJ já esta sendo utilizado',
        ];
    }
}
