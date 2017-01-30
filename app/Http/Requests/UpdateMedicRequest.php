<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateMedicRequest extends Request
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
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'blood_type' => 'required|exists:blood_types,id',
            'medic_type' => 'required|exists:medic_types,id',
            'dni' => 'required|integer|unique:medics,dni,'.$this->medics.',id,deleted_at,NULL',
            'street_address' => 'required|string',
            'license' => 'required|integer|unique:medics,license,'.$this->medics.',id,deleted_at,NULL',
            'cuit' => 'required|integer|unique:medics,cuit,'.$this->medics.',id,deleted_at,NULL',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:100',
        ];
    }
}
