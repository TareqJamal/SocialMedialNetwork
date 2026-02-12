<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SocialNetwork\NotificationService as objService;
use Illuminate\Support\Facades\Auth;


class ReadNotificationController extends Controller
{
    public function show($id, objService $service)
    {
        $userId = Auth::id();
        if ($id == 'all') {
            $service->repository->model->where('to_user_id', $userId)->update(['is_read' => 1]);
        } else {
            $obj = $service->find($id);
            if ($obj && $obj->to_user_id == $userId) {
                $obj->update(['is_read' => 1]);
            } else {
                return jsonSuccess(null, __('api.data_not_found'), 422);
            }
        }
        return jsonSuccess();
    }

}
