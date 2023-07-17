<?php

namespace App\Repositories;

use Illuminate\Support\Arr;
use App\Models\PostModel;

class PostRepository
{
    private $oPostModel;

    public function __construct(PostModel $oPostModel) {
        $this->oPostModel = $oPostModel;
    }

    public function getPosts() {
        return $this->oPostModel
            ->query()
            ->orderBy('created_at', 'DESC')
            ->with(['comments', 'user.userProfile', 'media'])
            ->get();
    }

    public function savePost(array $aData) {
        $aPostData = Arr::only($aData, $this->oPostModel->getFillable());
        return $this->oPostModel
            ->updateOrCreate(['post_id' => $aPostData['post_id'] ?? null], $aPostData);
    }
}
