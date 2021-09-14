<?php

namespace App\Http\Requests\Peoples\Office;

use Illuminate\Foundation\Http\FormRequest;

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
        $office = \Auth::user()->UserHasEntity->Entity;

        return [
            'user.first_name'   =>  'bail|required|max:191',
            'user.last_name'    =>  'bail|nullable|max:191',
            'user.email'        =>  ($editable_user->email == $this->user['email'] ) ? 'bail|required|email' : 'bail|required|email|unique:users,email',

            'office.name'              =>  'bail|required|max:191',
            'office.company_name'      =>  'bail|nullable|max:200',
            'office.foundation_date'   =>  'bail|nullable|required',
            'office.cnpj'              =>  ($office->cnpj == $this->office['cnpj'] ) ? 'bail|required|max:20' : 'bail|required|max:20|unique:entities,cnpj',
        ];
    }

    public function messages()
    {
        return [
            'user.email.unique'     =>  'Este E-MAIL já esta sendo utilizado',
            'office.cnpj.unique'    =>  'Este CNPJ já esta sendo utilizado',
        ];
    }
}
