<?php

namespace App\Repositories;

use App\Models\PostMediaModel;

class PostMediaRepository
{
    private $oPostMediaModel;

    public function __construct(PostMediaModel $oPostMediaModel) {
        $this->oPostMediaModel = $oPostMediaModel;
    }

    public function savePostMedia(array $oData) {
        return $this->oPostMediaModel
            ->updateOrCreate(['post_media_id' => $oData['post_media_id'] ?? null], $oData);
    }
}
