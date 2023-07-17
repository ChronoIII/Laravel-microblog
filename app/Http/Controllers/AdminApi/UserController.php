<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
    private $oUserService;

    public function __construct(UserService $oUserService) {
        $this->oUserService = $oUserService;
    }

    public function index() {
        $oResponse = $this->oUserService->getUserData();
        return response()->json([
            'data' => $oResponse
        ], 200);
    }

    public function update() {

    }
}
