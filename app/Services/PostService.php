<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Repositories\CommentRepository;

class PostService
{
    private $oPostRepository;

    public function __construct(PostRepository $oPostRepository, CommentRepository $oCommentRepository) {
        $this->oPostRepository = $oPostRepository;
        $this->oCommentRepository = $oCommentRepository;
    }

    public function getPosts() {
        return $this->oPostRepository->getPosts();
    }

    public function createPost(array $aData) {
        $aData['user_credential_id'] = auth('sanctum')->user()->user_credential_id;
        return $this->oPostRepository->createPost($aData);
    }

    public function createComment(array $aData) {
        $aData['user_credential_id'] = auth('sanctum')->user()->user_credential_id;
        return $this->oCommentRepository->createComment($aData);
    }
}
