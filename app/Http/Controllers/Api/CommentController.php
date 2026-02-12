<?php

namespace App\Http\Controllers\Api;

use App\Enums\NotificationTypesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\CommentRequest;
use App\Http\Resources\PostResource;
use App\Services\SocialNetwork\CommentService;
use App\Services\SocialNetwork\NotificationService;
use App\Services\SocialNetwork\PostService;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(CommentRequest $request, CommentService $service, PostService $postService)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $service->store($data);
        $post = $postService->find($data['post_id']);
        return jsonSuccess(PostResource::make($post));
    }

    public function update(CommentRequest $request, $id, CommentService $service, PostService $postService, NotificationService $notificationService)
    {
        $data = $request->validated();
        $comment = $service->find($id);
        if (!$comment) {
            return jsonApiValid(null, __('api.data_not_found'));
        }
        $service->update($id, $data);
        $post = $postService->find($comment->post_id);
        if ($data['user_id'] != $post->user_id) {
            $notificationService->store([
                'form_user_id' => $data['user_id'],
                'to_user_id' => $post->user_id,
                'title' => 'تعليق جديد',
                'message' => 'لديك تعليق جديد',
                'action' => NotificationTypesEnum::CommentPost->action(),
            ]);
        }
        return jsonSuccess(PostResource::make($post));
    }

    public function destroy($id, CommentService $service)
    {
        $comment = $service->find($id);
        if (!$comment) {
            return jsonApiValid(null, __('api.data_not_found'));
        }
        $service->delete($id);
        return jsonSuccess();
    }

}
