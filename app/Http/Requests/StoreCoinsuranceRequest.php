<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreCoinsuranceRequest extends Request
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
            //
             /*
            'name' => 'required|max:20',
            'affiliate_type' => 'required|in:Obligatorio,Voluntario,Prepago',

            */

            'name' => 'required|max:20',
            'affiliate_type' => 'required|in:Obligatorio,Voluntario,Prepago',
            'module' => 'required|in:Crónico,Agudo,Dual',
            'available_days' => 'required|integer',
            'renovation_days' => 'required|integer',
            'price_per_day' => 'required|numeric',
            'coverage' => 'required|numeric',
            'iva' => 'required|numeric',  
            
        ];
    }
}
