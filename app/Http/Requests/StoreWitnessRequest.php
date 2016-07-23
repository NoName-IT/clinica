<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreWitnessRequest extends Request
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
          /*  'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'birth_date' => 'required|date',
            'dni' => 'required|integer',
            'street_address' => 'required|string',
            'phone' => 'required|integer',
            'dni_type' => 'required|exists:dni_types,id',
            'relationship' => 'required|exists:relationships,id',
        */
        ];
    }
}
