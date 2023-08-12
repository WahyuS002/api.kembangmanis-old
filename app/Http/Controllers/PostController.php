<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\{PostStoreRequest, PostUpdateRequest};
use App\Http\Resources\PostCollection;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = new PostCollection(Post::with(['author', 'media'])->latest()->paginate(6));
        return response()->json($posts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        try {
            $post = Post::create($request->except('thumbnail'));
            $post->addMediaFromRequest('thumbnail')->toMediaCollection('post_thumbnails');

            return response()->json($post, 201);
        } catch (\Throwable $error) {
            return response()->json([
                'message' => 'Failed to create post.',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post->load('media', 'author'), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        try {
            $post->update($request->except('thumbnail'));

            if ($request->hasFile('thumbnail')) {
                $post->clearMediaCollection('post_thumbnails');
                $post->addMediaFromRequest('thumbnail')->toMediaCollection('post_thumbnails');
            }

            return response()->json(['message' => 'Post updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the post'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->clearMediaCollection('post_thumbnails');
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
