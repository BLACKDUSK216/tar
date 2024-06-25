<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    $posts = App\Models\Post::all();
    return view('posts.index', ['posts' => $posts]);
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); 
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit'); 
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update'); 
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy'); 
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


