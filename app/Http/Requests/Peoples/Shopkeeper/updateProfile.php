<?php

namespace App\Http\Requests\Peoples\Shopkeeper;

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
        $entity = \Auth::user()->UserHasEntity->Entity;
        // entity

        return [
            'user.first_name'   =>  'bail|required|max:191',
            'user.last_name'    =>  'bail|nullable|max:191',
            'user.email'        =>  ($editable_user->email == $this->user['email'] ) ? 'bail|required|email' : 'bail|required|email|unique:users,email',
            'user.password'     =>  'bail|nullable|min:5|confirmed',

            'entity.company_name'      =>  'bail|required|max:200',
            'entity.foundation_date'   =>  'bail|nullable',
            'entity.cnpj'              =>  ($entity->cnpj == $this->entity['cnpj'] ) ? 'bail|required|max:20' : 'bail|required|max:20|unique:entities,cnpj',

            // 'shopkeeper_addres.zip_code'          =>  'bail|required|max:20',
            // 'shopkeeper_addres.street'            =>  'bail|required|max:200',
            // 'shopkeeper_addres.neighborhood'      =>  'bail|required|max:30',
            // 'shopkeeper_addres.city'              =>  'bail|required|max:20',
            // 'shopkeeper_addres.state'             =>  'bail|required|max:20',
            // 'shopkeeper_addres.ibge'              =>  'bail|required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'user.email.unique'     =>  'Este E-MAIL já esta sendo utilizado',
            'user.cpf.unique'       =>  'Este CPF já esta sendo utilizado',
            'entity.cnpj.unique'    =>  'Este CNPJ já esta sendo utilizado',
        ];
    }
}
