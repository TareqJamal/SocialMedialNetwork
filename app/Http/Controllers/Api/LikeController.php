<?php

namespace App\Http\Controllers\Api;

use App\Enums\NotificationTypesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\LikeRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Services\SocialNetwork\LikeService;
use App\Services\SocialNetwork\NotificationService;
use App\Services\SocialNetwork\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function index(Request $request, PostService $postService)
    {
        $post = $postService->find($request->post_id);
        $users = $post->likedUsers;
        return jsonSuccess(UserResource::collection($users));
    }

    public function store(LikeRequest $request, LikeService $service, PostService $postService, NotificationService $notificationService)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $obj = $service->getWhereFirst(['user_id' => $data['user_id'], 'post_id' => $data['post_id']]);
        $post = $postService->find($data['post_id']);
        if ($obj) {
            $obj->delete();
        } else {
            $service->store($data);
            if ($data['user_id'] != $post->user_id) {
                $notificationService->store([
                    'form_user_id' => $data['user_id'],
                    'to_user_id' => $post->user_id,
                    'title' => 'تسجيل اعجاب',
                    'message' => 'لديك تسجيل اعجاب جديد',
                    'action' => NotificationTypesEnum::LikePost->action(),
                ]);
            }
        }
        return jsonSuccess(PostResource::make($post));
    }


}
