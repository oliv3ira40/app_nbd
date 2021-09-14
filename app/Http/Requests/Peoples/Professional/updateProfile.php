<?php

namespace App\Http\Requests\Peoples\Professional;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Admin\User;

class updateProfile extends FormRequest
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
        $editable_user = \Auth::user();
        $professional = $editable_user->UserHasEntity->Entity;

        return [
            'user.first_name'       =>  'bail|required|max:191',
            'user.last_name'        =>  'bail|nullable|max:191',
            'user.email'            =>  ($editable_user->email == $this->user['email'] ) ? 'bail|required|email' : 'bail|required|email|unique:users,email',
            'user.password'         =>  'bail|nullable|min:5|confirmed',

            'professional.cnpj'     =>  ($professional->cnpj == $this->professional['cnpj'] ) ? 'bail|nullable|max:20' : 'bail|nullable|max:20|unique:entities,cnpj',
        ];
    }


    public function messages()
    {
        return [
            'user.email.unique'         =>  'Este E-MAIL já esta sendo utilizado',
            'professional.cnpj.unique'  =>  'Este CNPJ já esta sendo utilizado',
        ];
    }
}
