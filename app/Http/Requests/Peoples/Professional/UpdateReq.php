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
        return [
            'company_name' => 'bail|required|max:400',
        ];
    }
}
