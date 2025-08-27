<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/ping', fn () => response()->json(['message' => 'Pong from web.php!']));
Route::get('/api', fn () => response()->json(['message' => 'API is working!']));
Route::get('/api/v1/ping', fn () => response()->json(['message' => 'Pong from api.php!']));
Route::get('/api/v1/user', function () {
    $users = [
        [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'admin',
        ],
        [
            'id' => 2,
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'role' => 'user',
        ],
        [
            'id' => 3,
            'name' => 'Peter Jones',
            'email' => 'peterjones@example.com',
            'role' => 'user',
        ],
    ];

    return response()->json($users);
});

// auth
Route::post('/api/register', [AuthController::class, 'register']);
Route::post('/api/login', [AuthController::class, 'login']);
Route::post('/api/logout', [AuthController::class, 'logout']);

// protected route
Route::middleware('auth:sanctum')->get('/api/user', function (Request $request) {
    return response()->json($request->user());
});