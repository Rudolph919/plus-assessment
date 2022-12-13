<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//    Route::resource('users', UserController::class);

//    Route::get('/users', [UserController::class, 'index'])->name('users.index');

//    GET 	        /users 	            index 	    users.index
//    GET 	        /users/create 	    create 	    users.create
//    POST 	        /users 	            store 	    users.store
//    GET 	        /users/{id} 	    show 	    users.show
//    GET 	        /users/{id}/edit 	edit 	    users.edit
//    PUT/PATCH 	/users/{id} 	    update 	    users.update
//    DELETE 	    /users/{id} 	    destroy 	users.destroy

    Route::GET('/users', [UserController::class, 'index'])->name('users.index');
    Route::GET('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::POST('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::GET('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::POST('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');

    Route::delete('/users/delete', [UserController::class, 'index'])->name('users.delete');

//    Route::prefix('users')->group(function() {
//        Route::get('list')
//    });
});






require __DIR__.'/auth.php';
