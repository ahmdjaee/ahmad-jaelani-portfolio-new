<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ProjectTagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Projects
|--------------------------------------------------------------------------
*/

// Projects
Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::get('/featured', [ProjectController::class, 'featured']);
    Route::get('/year/{year}', [ProjectController::class, 'byYear']);
    Route::get('/tag/{tag}', [ProjectController::class, 'byTag']);
    Route::get('/{identifier}', [ProjectController::class, 'show']);
});

// Tags
Route::prefix('tags')->group(function () {
    Route::get('/', [ProjectTagController::class, 'index']);
    Route::get('/{slug}', [ProjectTagController::class, 'show']);
});


// Projects
Route::prefix('blogs')->group(function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/{identifier}', [BlogController::class, 'show']);
});
