<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 't_posts';

    protected $primaryKey = 'post_id';

    protected $guarded = [];
}
