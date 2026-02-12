<?php

namespace App\Http\Controllers\Api;

use App\Enums\ConnectionsStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetwork\ConnectionRequestRequest;
use App\Http\Resources\ConnectionResource;
use App\Services\SocialNetwork\ConnectionService;
use Illuminate\Support\Facades\Auth;

class ConnectionsRequestController extends Controller
{
    public function index(ConnectionService $service)
    {
        $data = $service->getWhere(['user_id' => Auth::id(), 'status' => ConnectionsStatusEnum::Pending->value]);
        return jsonSuccess(ConnectionResource::collection($data));
    }

    public function store(ConnectionRequestRequest $request, ConnectionService $service)
    {
        $data = $request->validated();
        $result = $service->sendConnectionRequest($data);
        if ($result['error']) {
            return jsonApiValid(null, $result['error']);
        }
        return jsonSuccess();
    }

    public function update(ConnectionRequestRequest $request, $id, ConnectionService $service)
    {
        $data = $request->validated();
        $obj = $service->find($id);
        if (!$obj) {
            return jsonApiValid(null, __("api.data_not_found"));
        }
        $data['user_id'] = Auth::id();
        $service->updateConnectionRequest($id, $data);
        return jsonSuccess();
    }

}
