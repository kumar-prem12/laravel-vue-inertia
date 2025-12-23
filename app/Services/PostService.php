<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    public function __construct(protected PostRepository $postRepository){}

    public function list()
    {
        return $this->postRepository->list();
    }

    public function store(array $data)
    {
        return $this->postRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->postRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->postRepository->delete($id);
    }

    public function find($id)
    {
        return $this->postRepository->find($id);
    }
}

