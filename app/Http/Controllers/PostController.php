<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Inertia\Inertia;

class PostController extends Controller
{
    public function __construct(
        protected PostService $postService
    ) {}

    public function index()
    {
        return Inertia::render('Posts/Index', [
            'posts' => $this->postService->list(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    public function store(PostRequest $request)
    {
        $post = $this->postService->store($request->validated());
        if($post){
            return to_route('posts.index')->with('toast', [
                'type' => 'success',
                'message' => 'Post created successfully',
            ]);
        }else{
            return to_route('posts.index')->with('toast', [
                'type' => 'error',
                'message' => 'Post not created',
            ]);
        }
        
    }

    public function edit($id)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $this->postService->find($id),
        ]);
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->postService->update($id, $request->validated());

        if($post){
            return to_route('posts.index')->with('toast', [
                'type' => 'success',
                'message' => 'Post updated successfully',
            ]);
        }else{
            return to_route('posts.index')->with('toast', [
                'type' => 'error',
                'message' => 'Post not updated',
            ]);
        }
    }

    public function destroy($id)
    {
        $post = $this->postService->delete($id);

        if($post){
            return redirect()->back()->with('toast', [
                'type' => 'success',
                'message' => 'Post deleted successfully',
            ]);
        }else{
            return redirect()->back()->with('toast', [
                'type' => 'error',
                'message' => 'Post not deleted',
            ]);
        }
    }
}

