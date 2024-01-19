<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
Route::post('/register', function (Request $request) {

    return \App\Models\User::create([
        'name' => 'test',
        'email' => 'test@test.com',
        'email_verified_at' => now(),
        'password' => 'test1234', // password
        'two_factor_secret' => null,
        'two_factor_recovery_codes' => null,
        'remember_token' => Str::random(10),
        'profile_photo_path' => null,
        'current_team_id' => null,
    ]);
//    \App\Models\User::factory()->count(12)->create();
//    return $user;
});


Route::middleware('auth:sanctum')
    ->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::controller(PostController::class)->group(function () {
            Route::post('/post/create', 'createPost');
        });


        Route::get('/test', function (Request $request) {
            $posts = Post::query()->get();
            return $posts;
        })->middleware('role:abc');
//
//    Route::
    });
