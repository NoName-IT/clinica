<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreMedicRequest extends Request
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
            'dni' => 'required|unique:medics,dni,NULL,id,deleted_at,NULL|integer',
            'street_address' => 'required|string',
            'cuit' => 'required|unique:medics,cuit,NULL,id,deleted_at,NULL|integer',
            'license' => 'required|unique:medics,license,NULL,id,deleted_at,NULL|integer',
            'phone' => 'required|max:30',
            'email' => 'required|email|max:100',
        ];
    }
}
