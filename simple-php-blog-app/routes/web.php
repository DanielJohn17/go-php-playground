<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = [];

    if (Auth::check()) {
        $posts = Auth::user()->userPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});

Route::post("/register", [UserController::class, 'register']);
Route::post("/login", [UserController::class, 'login']);
Route::post("/logout", [UserController::class, 'logout']);

// Blog post routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditPostScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'editPost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
