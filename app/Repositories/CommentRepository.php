<?php

namespace App\Repositories;

use Illuminate\Support\Arr;
use App\Models\CommentModel;

class CommentRepository
{
    private $oCommentModel;

    public function __construct(CommentModel $oCommentModel) {
        $this->oCommentModel = $oCommentModel;
    }

    public function createComment(array $aData) {
        $aCommentData = Arr::only($aData, $this->oCommentModel->getFillable());
        return $this->oCommentModel->create($aCommentData);
    }
}
