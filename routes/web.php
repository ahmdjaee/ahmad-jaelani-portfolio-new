<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Livewire\Admin\Blog\Create as BlogCreate;
use App\Livewire\Admin\Blog\Edit as BlogEdit;
use App\Livewire\Admin\Blog\Index as BlogIndex;
use App\Livewire\Admin\Project\Create;
use App\Livewire\Admin\Project\Edit;
use App\Livewire\Admin\Project\Index;
use Illuminate\Support\Facades\Artisan;
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
    Route::get('/admin-panel/project/edit', Edit::class)->name('admin.project.edit');

    Route::get('/admin-panel/blogs', BlogIndex::class)->name('admin.blogs');
    Route::get('/admin-panel/blogs/create', BlogCreate::class)->name('admin.blogs.create');
    Route::get('/admin-panel/blogs/edit', BlogEdit::class)->name('admin.blogs.edit');
});

Route::get('/admin-panel/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin-panel/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/admin-panel/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/', fn() => view('pages.index'));
Route::get('/about', fn() => view('pages.about'));
// Route::get('/test', fn() => view('pages.test'));
Route::get('/contact', fn() => view('pages.contact'));
Route::get('/blog', fn() => view('pages.blog'));
Route::get('/resume', fn() => view('pages.resume'));


Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


Route::post('/send-email', [ContactController::class, 'sendEmail']);

Route::get('/framework-optimize', function () {
    Artisan::call('optimize', );
    Artisan::call('filament:optimize', );

    info('Optimize done!');

    return redirect(route('project.index'));
});

Route::get('/framework-optimize-clear', function () {
    Artisan::call('optimize:clear', );
    Artisan::call('filament:optimize-clear', );

    info('Optimize clear done!');

    return redirect(route('project.index'));
});