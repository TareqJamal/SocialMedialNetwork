<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\PostRequest;
use App\Http\Resources\PostResource;
use App\Services\SocialNetwork\PostService;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(PostService $service)
    {
        $user = Auth::user();
        $data = $service->getWhereWithRelations(['user', 'images','comments','likes'], ['user_id' => $user->id]);
        return jsonSuccess(PostResource::collection($data));
    }

    public function store(PostRequest $request, PostService $service)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $post = $service->storePost($data);
        return jsonSuccess(PostResource::make($post));
    }

    public function update(PostRequest $request, $id, PostService $service)
    {
        $data = $request->validated();
        $post = $service->find($id);
        if (!$post) {
            return jsonApiValid(null, __('api.data_not_found'));
        }
        $service->updatePost($id, $data);
        $post = $service->find($id);
        return jsonSuccess(PostResource::make($post));
    }

    public
    function show($id, PostService $service)
    {
        $post = $service->find($id);
        if (!$post) {
            return jsonApiValid(null, __('api.data_not_found'));
        }
        return jsonSuccess(PostResource::make($post));
    }

    public
    function destroy($id, PostService $service)
    {
        $post = $service->find($id);
        if (!$post) {
            return jsonApiValid(null, __('api.data_not_found'));
        }
        $service->delete($id);
        return jsonSuccess();
    }

}
