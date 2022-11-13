<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//controller
// use App\Http\Controllers\Posts\PostsController;
// use App\Http\Controllers\Posts\Admin\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// It is still valid, but currently no plan for it...

// Route::get('/posts', function () {
//     return Inertia::render('Posts');
// })->middleware(['auth', 'verified'])->name('posts');

// Route::resource('posts', PostsController::class)->except(['show']);
// Route::get('/posts/listing', function() {
//     return Inertia::render('Posts/Listing');
// });
//temp route for posts
Route::get('/posts', [App\Http\Controllers\Posts\PostsController::class, 'index']);
Route::get('/posts/detail/{id}', [App\Http\Controllers\Posts\PostsController::class, 'detail']);

// Route::get('/posts/detail/{id}', [PostsController::class, 'detail']);

Route::get('/admin/posts', [\App\Http\Controllers\Posts\Admin\PostsController::class, 'index']);
Route::get('/admin/posts/create', [\App\Http\Controllers\Posts\Admin\PostsController::class, 'create'])->name('adminposts.create');
Route::post('/admin/posts/preview', [\App\Http\Controllers\Posts\Admin\PostsController::class, 'preview'])->name('adminposts.preview');
Route::get('/admin/posts/view/{id}', [\App\Http\Controllers\Posts\Admin\PostsController::class, 'view'])->name('adminposts.view');

require __DIR__.'/auth.php';
