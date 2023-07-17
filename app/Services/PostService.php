<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Repositories\CommentRepository;
use App\Repositories\PostMediaRepository;
use App\Services\AwsS3Service;

class PostService
{
    /**
     * S3_POST_IMAGE_PATH
     * {username}/post_media/{date}/{filename}
     */
    const S3_POST_IMAGE_PATH = '/%s/post_media/%s/%s';

    private $oAwsS3Service;

    private $oPostRepository;

    public function __construct(AwsS3Service $oAwsS3Service, PostRepository $oPostRepository, CommentRepository $oCommentRepository, PostMediaRepository $oPostMediaRepository) {
        $this->oAwsS3Service = $oAwsS3Service;
        $this->oPostRepository = $oPostRepository;
        $this->oCommentRepository = $oCommentRepository;
        $this->oPostMediaRepository = $oPostMediaRepository;
    }

    public function getPosts() {
        return $this->oPostRepository->getPosts();
    }

    public function createPost(array $aData) {
        $aData['user_credential_id'] = auth('sanctum')->user()->user_credential_id;
        $aPostResponse = $this->oPostRepository->savePost($aData);

        $aImages = $aData['image'] ?? [];
        foreach ($aImages as $iIndex => $oPostImage) {
            $sFileName = time() . '_' .$oPostImage->getClientOriginalName();
            $sFilePath = sprintf(self::S3_POST_IMAGE_PATH, auth('sanctum')->user()->username, date('Y-m-d'), $sFileName);
            $oFile = $this->oAwsS3Service->store('/4arceus5/post_media/' . date('Y-m-d') . '/' . $sFileName, $oPostImage);
            $this->oPostMediaRepository->savePostMedia([
                'post_id'       => $aPostResponse['post_id'],
                'media_path'    => $sFilePath,
                'media_order'   => $iIndex,
            ]);
        }
    }

    public function createComment(array $aData) {
        $aData['user_credential_id'] = auth('sanctum')->user()->user_credential_id;
        return $this->oCommentRepository->saveComment($aData);
    }
}
