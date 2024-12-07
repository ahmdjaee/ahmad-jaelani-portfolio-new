<?php

use App\Http\Controllers\ContactController;
use App\Mail\SendEmail;
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

Route::get('/', fn() => view('pages.index'));
Route::get('/about', fn() => view('pages.about'));
Route::get('/test', fn() => view('pages.test'));
Route::get('/contact', fn() => view('pages.contact'));
Route::get('/blog', fn() => view('pages.blog'));
Route::get('/project', fn() => view('pages.project'));
Route::get('/resume', fn() => view('pages.resume'));

Route::prefix('project')->group(function () {
    Route::get('/blog-app', fn() => view('pages.project-details.blog-app'));
    Route::get('/larest-admin', fn() => view('pages.project-details.larest-admin'));
    Route::get('/larest-client', fn() => view('pages.project-details.larest-client'));
    Route::get('/landing-page-nft', fn() => view('pages.project-details.landing-page-nft'));
    Route::get('/login-management', fn() => view('pages.project-details.login-management'));
    Route::get('/module-app', fn() => view('pages.project-details.module-app'));
    Route::get('/irkaexpress', fn() => view('pages.project-details.irka-express'));
});

Route::get('admin', fn() => view('pages.admin-panel.index'));

Route::post('/send-email', [ContactController::class, 'sendEmail']);
