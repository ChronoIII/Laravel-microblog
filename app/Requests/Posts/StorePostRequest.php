<?php

namespace App\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'post_content'  => ['required', 'string', 'max:255'],
        ];
    }
}
