<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Models\Course;
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

Route::get('/', [DashController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:A'])->group(function () {
    Route::get('/dashboard', [DashController::class, 'admin'])->middleware(['auth'])->name('admin');
});

Route::get('/', [DashController::class, 'user'])->middleware(['auth'])->name('users');
Route::post('/regist', [DashController::class, 'regist'])->middleware(['auth'])->name('regists');
Route::get('/regist/{id}', [DashController::class, 'form'])->middleware(['auth'])->name('forms');


Route::resource('kategori', CategoryController::class);
Route::resource('kursus', CourseController::class);



require __DIR__.'/auth.php';