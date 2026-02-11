<?php

namespace App\Services\SocialNetwork;


use App\Repositories\SocialNetwork\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(private UserRepository $repository)
    {

    }

    public function login($data)
    {
        $user = $this->getWhereFirst(['email' => $data['email']]);
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return ['error' => __("api.the_password_is_incorrect")];
        }
        $token = $user->createToken('api-token')->plainTextToken;
        $user->token = $token;
        return $user;

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
