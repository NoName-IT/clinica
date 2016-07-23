<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreInternmentConfirmRequest extends Request
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
         /*   'diagnostic' => 'required|string|max:255',
            'room' => 'required|integer',
            'clinic_history' => 'required|integer',
            'medic' => 'required|integer|exists:medics,id',
        */
        ];
    }
}
