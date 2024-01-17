<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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
Route::get('/test', function (Request $request) {

    $posts = Post::query()->get();

    return $posts;
//    \App\Models\User::factory()->count(12)->create();
//    return $user;
});

Route::post('/sanctum/token', function (Request $request) {
    
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required'
    ]);

    $credentials = $request->only([
        'email',
        'password',
        'device_name',
    ]);

    Log::debug(json_encode($credentials));

    /** @var User $user */
    $user = User::query()->where('email', $credentials['email'])->first();

    if (!$user || !Hash::check($credentials['password'], $user->getAttribute('password'))) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    Log::debug('1' . $user->getAuthPassword());
    Log::debug('2' . $user->getAttribute('password'));


    return $user->createToken($credentials['device_name'])->plainTextToken;

});

Route::post('/tokens/create', function (Request $request) {

    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::middleware('auth:sanctum')
    ->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

//    Route::
    });
