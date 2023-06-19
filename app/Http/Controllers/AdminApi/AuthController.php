<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Requests\Auth\LoginUserRequest;
use App\Requests\Auth\RegisterUserRequest;

use App\Services\AuthService;

class AuthController extends Controller
{
    private $oAuthService;

    public function __construct(AuthService $oAuthService) {
        $this->oAuthService = $oAuthService;
    }

    public function login(LoginUserRequest $request) {
        $oResponse = $this->oAuthService->loginUser($request->validated());
        $iCode = ($oResponse['user'] !== null) ? 200 : 401;

        return response()->json([
            'data'  => $oResponse,
        ], $iCode);
    }

    public function register(RegisterUserRequest $request) {
        $oResponse = $this->oAuthService->registerUser($request->validated());
        return response()->json([
            'data'  => $oResponse
        ], 201);
    }
}
