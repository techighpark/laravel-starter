<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/test', function (Request $request){

    $posts = Post::query()->get();

    return $posts;
//    \App\Models\User::factory()->count(12)->create();
//    return $user;
});
Route::middleware('auth:sanctum')
    ->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

//    Route::
});
