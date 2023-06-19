<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Requests\Posts\StoreCommentRequest;
use App\Services\PostService;

class CommentController extends Controller
{
    private $oPostService;

    public function __construct(PostService $oPostService) {
        $this->oPostService = $oPostService;
    }

    public function store(StoreCommentRequest $request) {
        $aData = $request->validated();
        $oResponse = $this->oPostService->createComment($aData);

        return response()->json([
            'data'  => $oResponse,
        ]);
    }

    public function destroy() {

    }
}
