<?php

use App\Http\Controllers\CommentApiController;
use App\Http\Controllers\PostApiController;
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
Route::post('/user/create', function (Request $request) {

    $user = new \App\Actions\Fortify\CreateNewUser();
    try {
        $newUser = $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);
    } catch (\Illuminate\Validation\ValidationException $exception) {
        return $exception->getMessage();
    }
    return $newUser;
});


Route::middleware('auth:sanctum')
    ->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::resource('posts', PostApiController::class);
        Route::post('/comments/{id}', [CommentApiController ::class, 'storeChild']);
//        Route::get('/comments/{id}', [CommentApiController ::class, 'showChild']);
        Route::resource('posts.comments', CommentApiController ::class)
            ->shallow();


//        Route::controller(PostController::class)
//            ->prefix('/posts')
//            ->group(function () {
//                Route::get('/', 'showPosts');
//
//                Route::get('/create', 'showCreatePost');
//                Route::post('/', 'createPost');
//
//                Route::get('/{id}', 'showPost');
//
//                Route::get('/{id}/edit', 'showEditPost');
//                Route::put('/{id}', 'editPost');
//
//                Route::delete('/{id}', 'deletePost');
//            });


//        Route::get('/test', function (Request $request) {
//            $posts = Post::query()->get();
//            return $posts;
//        })->middleware('role:abc');
//
//    Route::
    });
