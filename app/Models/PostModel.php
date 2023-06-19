<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 't_posts';

    protected $primaryKey = 'post_id';

    protected $fillable = [
        'user_credential_id',
        'post_content',
    ];

    public function user() {
        return $this->belongsTo(UserCredentialModel::class, 'user_credential_id', 'user_credential_id');
    }

    public function comments() {
        return $this->hasMany(CommentModel::class, 'post_id', 'post_id');
    }
}
