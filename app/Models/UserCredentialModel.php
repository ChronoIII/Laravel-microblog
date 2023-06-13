<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class UserCredentialModel extends Model
{
    use HasApiTokens;

    protected $table = 't_user_credentials';

    protected $primaryKey = 'user_credential_id';

    protected $guarded = [];
}
