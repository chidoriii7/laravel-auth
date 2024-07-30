<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Guest\PostController as GuestPostController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function(){
    Route::get('/posts', [GuestPostController::class, 'index']);
});


Route::middleware('auth', 'verified')
->name('admin.')
->prefix('admin')
->group(function () {

    Route::get('/', [ProjectController::class, 'index'])->name('dashboard');



    //per passare lo slug
    Route::resource('posts', PostController::class)->parameters([
        'posts' => 'post:slug'
    ]);


    //per passare ID
    //Route::resource('posts', PostController::class);

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
