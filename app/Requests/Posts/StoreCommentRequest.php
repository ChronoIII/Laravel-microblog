<?php

namespace App\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'post_id'               => ['required', 'exists:t_posts,post_id'],
            'comment_content'        => ['required', 'string'],
        ];
    }
}
