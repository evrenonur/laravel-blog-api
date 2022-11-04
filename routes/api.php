<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\QuestionsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsApiController;
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

    Route::get('/posts', [PostsController::class, 'index']);
    Route::get('/posts/{id}', [PostsController::class, 'post']);
    Route::get('/comments/{id}', [CommentsController::class, 'comments']);
    Route::post('/comments/{id}', [CommentsController::class, 'createComment']);
    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::get('/categories/{id}', [CategoriesController::class, 'categoryPosts']);

    Route::get('/questions', [QuestionsController::class, 'questions']);
    Route::get('/questions/{id}', [QuestionsController::class, 'question']);
    Route::post('/answers/{id}', [QuestionsController::class, 'createAnswer']);
    Route::post('/questions', [QuestionsController::class, 'createQuestion']);
    Route::get('/questions/answers/{id}', [QuestionsController::class, 'answers']);


});


