<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $oUserRepository;

    public function __construct(UserRepository $oUserRepository) {
        $this->oUserRepository = $oUserRepository;
    }

    public function getUserData() {
        $sUserName = auth('sanctum')->user()->username;
        return $this->oUserRepository->getUserByUsername($sUserName);
    }

    public function updateUserData() {

    }
}
