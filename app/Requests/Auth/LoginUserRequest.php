<?php

namespace App\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'username'  => ['required', 'string', 'max:255',],
            'password'  => ['required', 'string',]
        ];
    }

    public function messages() {
        return [

        ];
    }

    public function attributes() {
        return [

        ];
    }
}
