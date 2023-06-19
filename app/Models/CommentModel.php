<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = 't_comments';

    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'user_credential_id',
        'post_id',
        'comment_content'
    ];
}
