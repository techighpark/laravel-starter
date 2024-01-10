<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    function createPost(){
    Log::debug(json_encode(auth()));
    Log::debug(json_encode(auth()->user()));
    Log::debug(json_encode(auth()->guard('web')->user()));
    Log::debug(json_encode(auth()->guard('sanctum')->user()));
    Log::debug(Auth::user());
    Post::create([
       'title'=>'title',
       'content'=>'content'
    ]);
    }
}
