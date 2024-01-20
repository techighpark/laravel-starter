<?php

namespace App\Http\Controllers;

use App\Traits\ProductHelper;
use Illuminate\Http\Request;

class PostController extends Controller
{

    use ProductHelper;

    function store(Request $request)
    {
        $user = $request->user();
        $this->createProductHelper(title: 'title', contents: 'contents', user: $user);
        return $user->posts()->get();
    }
}



