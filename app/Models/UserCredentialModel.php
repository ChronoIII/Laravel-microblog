<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

use App\Models\UserProfileModel;

class UserCredentialModel extends Model
{
    use HasApiTokens;

    protected $table = 't_user_credentials';

    protected $primaryKey = 'user_credential_id';

    protected $fillable = [
        'username',
        'email',
        'password'
    ];

    public function userProfile() {
        return $this->hasOne(UserProfileModel::class, 'user_profile_id', 'user_profile_id');
    }
}
