<?php

namespace App\Services\SocialNetwork;


use App\Repositories\SocialNetwork\PostImageRepository;
use App\Repositories\SocialNetwork\PostRepository;

class PostService
{
    public function __construct(private PostRepository $repository, private PostImageRepository $postImageRepository)
    {

    }

    public function getDataTable()
    {
        return $this->repository->getDataTable();
    }

    public function storePost($data)
    {
        $post = $this->store($data);
        foreach ($data['images'] as $image) {
            $this->postImageRepository->storeWithFiles([
                'post_id' => $post->id,
                'image' => $image
            ]);
        }
        return $post;
    }

    public function updatePost($id, $data)
    {
        $post = $this->find($id);
        $this->updateWithFiles($id, $data);
        if (isset($data['images'])) {
            $post->images()->delete();
            foreach ($data['images'] as $image) {
                $this->postImageRepository->storeWithFiles([
                    'post_id' => $id,
                    'image' => $image
                ]);
            }
        }
        return $post;
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
    public function getWithRelations($relations)
    {
        return $this->repository->getWithRelations($relations);
    }

    public function getWhereWithRelations($relations ,$where)
    {
        return $this->repository->getWhereWithRelations($relations, $where);
    }

    public function getWhereFirst($where)
    {
        return $this->repository->getWhereFirst($where);
    }

}
