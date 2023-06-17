<?php

namespace App\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'username'      => ['required', 'string', 'max:255', 'unique:t_user_credentials,username'],
            'email'         => ['required', 'string', 'max:255', 'email'],
            'password'      => ['required', 'string', 'confirmed'],
            'firstName'    => ['required', 'string', 'max:255'],
            'lastName'     => ['required', 'string', 'max:255'],
        ];
    }
}
