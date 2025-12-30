<?php

namespace App\Repositories;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository
{
    public function __construct()
    {
        //
    }
    public function list($perPage = 10)
    {
        return Auth::user()->posts()->latest()->paginate($perPage);
    }

    public function find($id)
    {
        return Post::findOrFail($id);
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::user()->id;
        return Post::create($data);
    }

    public function update($id, array $data)
    {
        $post = $this->find($id);
        $post->update($data);
        return $post;
    }

    public function delete($id)
    {
        return Post::destroy($id);
    }
}
