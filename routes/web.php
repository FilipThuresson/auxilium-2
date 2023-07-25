<?php

use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/', [IndexController::class, 'index'])->name('home');

    Route::prefix('/post')->group(function() {
        Route::get('/', [PostsController::class, 'index'])->name('posts.index');
        Route::get('/show/{id}', [PostsController::class, 'show'])->name('posts.show');
        Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
        Route::post('/update/{id}', [PostsController::class, 'update'])->name('posts.update');
        Route::delete('/trash/{id}', [PostsController::class, 'destroy'])->name('posts.trash');
    });

    Route::get('/api_token', [ApiTokenController::class, 'update']);
});

require __DIR__.'/auth.php';
