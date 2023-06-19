<?php

namespace App\Repositories;

use App\Models\UserCredentialModel;
use App\Models\UserProfileModel;

use Illuminate\Support\Arr;

class UserRepository
{
    private $oUserCredentialModel;

    private $oUserProfileModel;

    public function __construct(UserCredentialModel $oUserCredentialModel, UserProfileModel $oUserProfileModel) {
        $this->oUserCredentialModel = $oUserCredentialModel;
        $this->oUserProfileModel = $oUserProfileModel;
    }

    public function getUserByUsername(string $sUsername) {
        $oUserData = $this->oUserCredentialModel
            ->where([
                'username'  => $sUsername
            ])
            ->with(['userProfile']);

        if (empty($oUserData)) {
            return null;
        }

        return $oUserData->first();
    }

    public function createUser(array $aData) {
        $aCredentialData = Arr::only($aData, $this->oUserCredentialModel->getFillable());
        $oCredential = $this->oUserCredentialModel->create($aCredentialData);

        $aProfileData = Arr::only($aData, $this->oUserProfileModel->getFillable());
        $aProfileData['user_credential_id'] = $oCredential->user_credential_id;
        $oProfile = $oCredential->userProfile()->create($aProfileData);

        $oCredential['user_profile'] = $oProfile;

        return $oCredential;
    }
}
