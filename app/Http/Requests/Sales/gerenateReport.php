<?php

namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;

class gerenateReport extends FormRequest
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
            'prof_and_offices_select'   =>  'bail|array|required',
            'shopkeepers_select'        =>  'bail|array|required',
            'selected_month'            =>  'bail|required',
            'purchase_date'             =>  'bail|nullable',
            'created_at'                =>  'bail|nullable',
            'ranking_types'             =>  'bail|required|in:1,2,3',
            'promotion_period'          =>  'bail|nullable',
            'bonus'                     =>  'bail|nullable|intiger',
        ];
    }
}
