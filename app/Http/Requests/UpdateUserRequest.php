<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class UpdateUserRequest extends Request
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
        //dd($this);
        //$user = User::find($this->users);

        return [
            //
            'name' => 'required|max:255',
            'password' => 'min:6|confirmed',
            'email' => 'required|email|max:255|unique:users,email,'.$this->users,

        ];
    }
}
