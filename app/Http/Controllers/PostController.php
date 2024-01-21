<?php

namespace App\Http\Controllers;

use App\Traits\PostHelper;
use Illuminate\Http\Request;

class PostController extends Controller
{

    use PostHelper;

    function store(Request $request)
    {
        $user = $request->user();
        $this->storePost(title: 'title', contents: 'contents', user: $user);
        return $user->posts()->get();
    }
}



