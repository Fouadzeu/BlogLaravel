<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccueilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CertificationController;




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
Route::get('/register',[RegisterController::class,'showRegistrationForm' ])->name('register');
Route::get('/login',[LoginController::class,'showLoginForm' ])->name('login');
Route::post('/login',[LoginController::class,'Login' ])->name('login');
Route::post('/logout',[LoginController::class,'logout' ])->name('logout');
Route::post('/register',[RegisterController::class,'register' ]);
Route::patch('/profile', [ProfileController::class, 'updatePassword']);

Route::resource('/admin/posts', AdminController::class)->except('show')->names('admin.posts');


Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::get('/home',[DashboardController::class,'index'])->name('dashboard');
Route::get('/',[AccueilController::class,'index'])->name('index');

Route::get('/categories/{category}',[CoursController::class, 'coursByCategory'])->name('cours.byCategory');



Route::middleware(['auth'])->group(function() {
    Route::get('/cours', [CoursController::class, 'index'])->name('cours.index');
    Route::get('/taches', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/certifications', [CertificationController::class, 'index'])->name('certifications.index');
});
