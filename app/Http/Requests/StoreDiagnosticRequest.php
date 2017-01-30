<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreDiagnosticRequest extends Request
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
           'code' => 'required|max:8|string|unique:diagnostics,code',
           'description' => 'required|max:200|string|',
        ];
    }
}
