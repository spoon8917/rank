<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(Usercontroller::class)->middleware(['auth'])->group(function(){
    Route::get('/','front')->name('front');
    Route::get('/mypage','mypage')->name('mypage');
});

Route::controller(Membercontroller::class)->middleware(['auth'])->group(function(){
    Route::get('/members', 'show')->name('show');
    Route::post('/member', 'store')->name('store');
    Route::get('/members/create', 'create')->name('create');
    Route::put('/members/{member}', 'update')->name('update');
    Route::get('/members/{member}/edit', 'edit')->name('edit');
    Route::delete('/members/{member}', 'delete')->name('delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
