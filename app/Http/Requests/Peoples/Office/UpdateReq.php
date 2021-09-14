<?php

namespace App\Http\Requests\Peoples\Office;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Admin\User;

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
        $editable_user = User::find($this->id);
        $office = $editable_user->Office;

        return [
            'user.first_name'       =>  'bail|required|max:191',
            'user.last_name'        =>  'bail|nullable|max:191',
            'user.email'            =>  ($editable_user->email == $this->user['email'] ) ? 'bail|required|email' : 'bail|required|email|unique:users,email',
            'user.telephone'        =>  'bail|nullable|max:20',
            'user.cpf'              =>  ($editable_user->cpf == $this->user['cpf'] ) ? 'bail|required|max:191' : 'bail|required|max:191|unique:users,cpf',

            'office.name'               =>  'bail|required|max:191',
            'office.company_name'       =>  'bail|nullable|max:200',
            'office.telephone'          =>  'bail|required|max:30',
            'office.foundation_date'    =>  'bail|nullable|required',
            'office.cnpj'               =>  ($office->cnpj == $this->office['cnpj'] ) ? 'bail|required|max:20' : 'bail|required|max:20|unique:offices,cnpj',


            'office_addres.zip_code'          =>  'bail|required|max:20',
            'office_addres.street'            =>  'bail|required|max:200',
            'office_addres.neighborhood'      =>  'bail|required|max:30',
            'office_addres.city'              =>  'bail|required|max:20',
            'office_addres.state'             =>  'bail|required|max:20',
            'office_addres.ibge'              =>  'bail|required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'user.email.unique'=> 'Este E-MAIL já esta sendo utilizado',
            'user.cpf.unique'=> 'Este CPF já esta sendo utilizado',
            'office.cnpj.unique'=> 'Este CNPJ já esta sendo utilizado',
        ];
    }
}
