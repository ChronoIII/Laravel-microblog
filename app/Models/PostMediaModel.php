<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMediaModel extends Model
{
    protected $table = 't_post_media';

    protected $primaryKey = 'post_media_id';

    protected $guarded = [];

    public function getMediaPathAttribute(string $sMediaPath) {
        return config('aws.base_path') . $sMediaPath;
    }
}
