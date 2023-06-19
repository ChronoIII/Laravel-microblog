<?php

namespace App\Services;

use App\Repositories\UserRepository;

class AuthService
{
    private $oUserRepository;

    public function __construct(UserRepository $oUserRepository) {
        $this->oUserRepository = $oUserRepository;
    }

    public function loginUser(array $aData) {
        $sUsername = $aData['username'];
        $sPassword = $aData['password'];

        $oUserData = $this->oUserRepository->getUserbyUsername($sUsername);
        if ($oUserData === null || password_verify($sPassword, $oUserData['password']) === false) {
            return [
                'user'  => null
            ];
        }

        $oUserData->tokens()->delete();
        $sToken = $oUserData->createToken($sUsername . ' token')->plainTextToken;

        return [
            'user'  => $oUserData,
            'token' => $sToken,
        ];
    }

    public function registerUser(array $aData) {
        unset($aData['password_confirmation']);
        $aData['password'] = password_hash($aData['password'], PASSWORD_DEFAULT);

        $oData = $this->oUserRepository->createUser($aData);
        return $oData;
    }
}
