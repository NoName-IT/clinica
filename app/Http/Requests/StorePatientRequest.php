<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StorePatientRequest extends Request
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
            /*
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'birth_date' => 'required|date',
            'birth_time' => array('required', 'regex:/^([0-1][0-9]|2[0-3]):[0-5][0-9]$/'),
            'civil_status' => 'required|exists:civil_statuses,id',
            'blood_type' => 'required|exists:blood_types,id',
            'dni' => 'required|integer',
            'street_address' => 'required|string',
            'phone' => 'required|integer',
            'dni_copy' => 'boolean',
            'coinsurance' => 'required|exists:coinsurances,id',
            'medical_insurance' => 'required|exists:medical_insurances,id',
            'dni_type' => 'required|exists:dni_types,id',



            */

            

        ];
    }
}
