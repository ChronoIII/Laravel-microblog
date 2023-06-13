<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Requests\Posts\StorePostRequest;
use App\Models\PostModel;

class PostController extends Controller
{
    public function __construct() {

    }

    public function index() {
        return response()->json([
            'data'  => PostModel::query()->orderBy('created_at', 'DESC')->get(),
        ], 200);
    }

    public function store(StorePostRequest $request) {
        $aPost = PostModel::create([
            'post_content'          => $request->get('post_content'),
            'user_credential_id'    => auth('sanctum')->user()->user_credential_id,
        ]);

        return response()->json([
            'data'      => $aPost,
            'message'   => 'Post created successfully.'
        ], 201);
    }

    public function show() {

    }

    public function destroy() {

    }
}
