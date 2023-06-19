<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Requests\Posts\StorePostRequest;
use App\Services\PostService;

class PostController extends Controller
{
    private $oPostService;

    public function __construct(PostService $oPostService) {
        $this->oPostService = $oPostService;
    }

    public function index() {
        $oResponse = $this->oPostService->getPosts();
        return response()->json([
            'data'  => $oResponse,
        ], 200);
    }

    public function store(StorePostRequest $request) {
        $aData = $request->validated();
        $oResponse = $this->oPostService->createPost($aData);
        return response()->json([
            'data'      => $oResponse,
            'message'   => 'Post created successfully.'
        ], 201);
    }

    public function show() {

    }

    public function destroy() {

    }
}
