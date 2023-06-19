<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfileModel extends Model
{
    protected $table = 't_user_profile';

    protected $primaryKey = 'user_profile_id';

    protected $fillable = [
        'user_credential_id',
        'first_name',
        'last_name',
        'birthdate'
    ];
}
