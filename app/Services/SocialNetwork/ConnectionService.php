<?php

namespace App\Services\SocialNetwork;


use App\Enums\ConnectionsStatusEnum;
use App\Enums\NotificationTypesEnum;
use App\Repositories\SocialNetwork\ConnectionRepository;
use App\Repositories\SocialNetwork\NotificationRepository;

class ConnectionService
{
    public function __construct(private ConnectionRepository $repository, private readonly NotificationRepository $notificationRepository)
    {

    }

    public function sendConnectionRequest($data)
    {
        $data['user_id'] = auth()->id();
        $data['status'] = ConnectionsStatusEnum::Pending->value;
        $alreadyExist = $this->getWhereFirst(['user_id' => $data['user_id'], 'connected_id' => $data['connected_id'], 'status' => ConnectionsStatusEnum::Pending]);
        if ($alreadyExist) {
            return ['error' => __("api.you_have_already_connection_requested")];
        }
        $this->notificationRepository->store([
            'form_user_id' => $data['user_id'],
            'to_user_id' => $data['connected_id'],
            'title' => ' طلب تواصل جديد',
            'message' => 'لديك طلب تواصل جديد',
            'action' => NotificationTypesEnum::NewConnection->action(),
        ]);
        return $this->store($data);
    }

    public function updateConnectionRequest($id, $data)
    {
        $this->update($id, $data);
        $obj = $this->find($id);
        if ($data['status'] == ConnectionsStatusEnum::Accepted) {
            $this->notificationRepository->store([
                'form_user_id' => $obj->user_id,
                'to_user_id' => $obj->connected_id,
                'title' => ' طلب تواصل جديد',
                'message' => 'تم الموافق علي طلب التواصل',
                'action' => NotificationTypesEnum::AcceptedConnection->action(),
            ]);
        }
    }


    public function getDataTable()
    {
        return $this->repository->getDataTable();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function first()
    {
        return $this->repository->first();
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function storeWithFiles($data)
    {
        return $this->repository->storeWithFiles($data);
    }

    public function storeWithFilesWithOneLanguage($data)
    {
        return $this->repository->storeWithFilesWithOneLanguage($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }


    public function updateWithFiles($id, $data)
    {
        return $this->repository->updateWithFiles($id, $data);

    }

    public function deleteWithFiles($id): bool
    {
        return $this->repository->deleteWithFiles($id);

    }

    public function get()
    {
        return $this->repository->get();
    }

    public function getWhere($where)
    {
        return $this->repository->getWhere($where);
    }

    public function getWhereFirst($where)
    {
        return $this->repository->getWhereFirst($where);
    }

}
