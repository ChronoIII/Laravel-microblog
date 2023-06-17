<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Requests\Auth\LoginUserRequest;
use App\Requests\Auth\RegisterUserRequest;

use App\Models\UserCredentialModel;
use App\Models\UserProfileModel;

class AuthController extends Controller
{
    public function __construct() {

    }

    public function login(LoginUserRequest $request) {
        $oUser = UserCredentialModel::where('username', '=', $request->get('username'))->first();

        if (($oUser == null) || (password_verify($request->get('password'), $oUser['password']) == false)) {
            // Credentials do not match a record.
            return response()->json([
                'data'      => null,
                'message'   => 'credentials do not match a record.'
            ], 401);
        }

        $oUser->tokens()->delete();

        return response()->json([
            'data'      => [
                'user'      => $oUser,
                'token'     => $oUser->createToken('API token of ' . $oUser['username'])->plainTextToken,
            ],
            'message'   => 'success',
        ], 200);
    }

    public function register(RegisterUserRequest $request) {
        $aUserCredential = UserCredentialModel::create([
            'username'      => $request->get('username'),
            'email'         => $request->get('email'),
            'password'      => password_hash($request->get('password'), PASSWORD_DEFAULT),
        ]);

        $aUserProfile = UserProfileModel::create([
            'user_credential_id'    => $aUserCredential['user_credential_id'],
            'first_name'            => $request->get('firstName'),
            'last_name'             => $request->get('lastName'),
        ]);

        return response()->json([
            'data'      => null,
            'message'   => 'success'
        ], 201);
    }
}
