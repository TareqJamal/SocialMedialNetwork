<?php

namespace App\Http\Controllers\Api;

use App\Enums\ConnectionsStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\ConnectionRequestRequest;
use App\Http\Resources\ConnectionResource;
use App\Services\SocialNetwork\ConnectionService;
use Illuminate\Support\Facades\Auth;

class MyConnectionsRequestController extends Controller
{
    public function index(ConnectionService $service)
    {
        $data = $service->getWithRelations(['user'], ['connected_id' => Auth::id(), 'status' => ConnectionsStatusEnum::Pending->value]);
        return jsonSuccess(ConnectionResource::collection($data));
    }

}
