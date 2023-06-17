<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfileModel extends Model
{
    protected $table = 't_user_profile';

    protected $primaryKey = 'user_profile_id';

    protected $guarded = [];
}
