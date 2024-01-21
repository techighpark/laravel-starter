<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $postId): ModelNotFoundException|\Illuminate\Database\Eloquent\Collection|\Exception
    {
        try {
            /** @var Post $post */
            $post = Post::query()->findOrFail($postId);
        } catch (ModelNotFoundException $e) {
            return $e;
        }
        return $post->comments()->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $postId)
    {
        /** @var Post $post */
        $post = Post::query()->findOrFail($postId);
        return $post->comments()->create([
            'comments' => $request->comments,
            'user_id' => $request->user()->getKey()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Builder|array|null
    {
        return Comment::query()->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
