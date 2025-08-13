<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Livewire\Admin\Login;
use App\Livewire\Admin\Project\Create;
use App\Livewire\Admin\Project\Edit;
use App\Livewire\Admin\Project\Index;
use App\Mail\SendEmail;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;
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
    Route::redirect('/admin-panel', '/admin-panel/project', 301);
    Route::get('/admin-panel/project', Index::class)->name('admin');
    Route::get('/admin-panel/project/create', Create::class)->name('admin.project.create');
    Route::get('/admin-panel/project/{id}edit', Edit::class)->name('admin.project.edit');
});

Route::get('/admin-panel/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin-panel/login', [LoginController::class, 'store'])->name('login');
Route::get('/admin-panel/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/', fn() => view('pages.index'));
Route::get('/about', fn() => view('pages.about'));
// Route::get('/test', fn() => view('pages.test'));
Route::get('/contact', fn() => view('pages.contact'));
Route::get('/blog', fn() => view('pages.blog'));
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/resume', fn() => view('pages.resume'));

Route::prefix('project')->group(function () {
    Route::get('/{id}', [ProjectController::class, 'show'])->name('project.show');
});


Route::post('/send-email', [ContactController::class, 'sendEmail']);