<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;


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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin.role'])->group(function () {
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('user/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
Route::put('user/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('user/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
Route::get('user/{id}', [UsersController::class, 'show'])->name('user.show');
});