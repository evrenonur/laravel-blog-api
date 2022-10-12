<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    $data = [
        'message' => "Welcome to our API"
    ];
    return response()->json($data, 200);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', [AuthController::class, 'getUser']);
Route::get('/refresh', [AuthController::class, 'refresh']);

Route::middleware('jwt.verify')->group(function() {

    Route::get('/posts', [PostsApiController::class, 'index']);
    Route::get('/posts/{id}', [PostsApiController::class, 'post']);
    Route::get('/categories', [PostsApiController::class, 'categories']);
    Route::get('/categories/{id}', [PostsApiController::class, 'categoryPosts']);
    Route::get('/comments/{id}', [PostsApiController::class, 'comments']);
    Route::post('/comments/{id}', [PostsApiController::class, 'comment']);

});


