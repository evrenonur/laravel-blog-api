<?php
use App\Http\Controllers\AuthController;
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
    Route::get('/dashboard', function() {
        return response()->json(['message' => 'Welcome to dashboard'], 200);
    });
});


