<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    function createPost()
    {
        Log::debug(Auth::user());

        /** @var Post $post */
        $post = Post::query()->with('user')->first();
        $foundUser = User::query()->find(1);

//        $post->save();
        return $post;

        $user = $post->user()->first();

        $user = Auth::user();
        return $user->posts()->get();
        try {
            Auth::user()->posts()->create([
                'title' => 'aaaa'
            ]);
        } catch (ModelNotFoundException) {
            return 'ㅇㅓㅂㅅ어용';
        }
//        Post::create(['title' => 'Traveling to Europe']);
//    $post = new Post();
//    $post->setAttribute('title','title');
//    $post->save();
//    Post::create([
//       'title'=>'title',
//       'content'=>'content'
//    ]);
    }
}
