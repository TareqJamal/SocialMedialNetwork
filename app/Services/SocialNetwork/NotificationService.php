<?php

namespace App\Services\SocialNetwork;

use App\Enums\NotificationTypesEnum;
use App\Repositories\SocialNetwork\NotificationRepository;
use App\Repositories\SocialNetwork\UserRepository;

class NotificationService
{

    public function __construct(private NotificationRepository $repository, private UserRepository $userRepository)
    {

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
    }public function getWhere($where)
    {
        return $this->repository->getWhere($where);
    }


}
