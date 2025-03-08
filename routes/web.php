<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginProfController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\DashboardController;
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
Route::get('/register',[RegisterController::class,'showRegistrationForm' ])->name('register');
Route::get('/login',[LoginController::class,'showLoginForm' ])->name('login');
Route::post('/login',[LoginController::class,'Login' ])->name('login');
Route::post('/logout',[LoginController::class,'logout' ])->name('logout');

Route::get('/login',[LoginProfController::class,'showLoginForm' ])->name('proflogin');
Route::post('/login',[LoginProfController::class,'Login' ])->name('proflogin');
Route::post('/logout',[LoginProfController::class,'logout' ])->name('proflogout');

Route::post('/register',[RegisterController::class,'register' ]);
Route::patch('/profile', [ProfileController::class, 'updatePassword']);

Route::resource('/admin/posts', AdminController::class)->except('show')->names('admin.posts');


Route::get('/home/profile',[ProfileController::class,'index'])->name('profile');
Route::get('/home',[DashboardController::class,'index'])->name('dashboard');
Route::get('/home',[DashboardController::class,'indexprof'])->name('dashboardprof');
Route::get('/',[AccueilController::class,'index'])->name('index');

Route::get('/categories/{category}',[CoursController::class, 'coursByCategory'])->name('cours.byCategory');

Route::get('register_professeur', [RegisterController::class, 'showProfesseurRegistrationForm'])->name('register.professeur');
Route::post('register_professeur', [RegisterController::class, 'registerProfesseur']);


Route::middleware(['auth'])->group(function() {
    Route::get('/cours', [CoursController::class, 'index'])->name('cours.index');
});

Route::post('/inscrire',[CoursController::class, 'UserCour'])->name('cours.inscrire');
