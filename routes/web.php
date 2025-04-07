<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginProfController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DevoirController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultatController;
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
Route::get('/register/prof',[RegisterController::class,'showProfesseurRegistrationForm' ])->name('profregister');
Route::post('/registerprof',[RegisterController::class,'registerProfesseur'])->name('prof.register');
Route::post('/register',[RegisterController::class,'register' ])->name('user.register');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('profile',[ProfileController::class,'index'])->name('profile');
    Route::patch('profile/update/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::patch('profile/update/email', [ProfileController::class, 'updateEmail'])->name('profile.update.email');
    Route::get('devoir',[DevoirController::class, 'index'])->name('devoir');
    Route::post('commencer',[DevoirController::class, 'inscrire'])->name('devoir.inscrire');
    Route::get('devoirs/{devoir}', [DevoirController::class, 'show'])->name('devoirs.show');
    Route::post('resultats/store', [ResultatController::class, 'store'])->name('resultats.store');



    Route::middleware('auth:web')->group(function () {
        Route::get('home', [DashboardController::class, 'index'])->name('dashboard');
    });
});


Route::prefix('professeur')->name('professeur.')->group(function () {
    Route::get('login', [LoginProfController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginProfController::class, 'login']);
    Route::post('logout', [LoginProfController::class, 'logout'])->name('logout');
    Route::get('profile',[ProfileController::class,'indexProf'])->name('profile');
    Route::patch('profile/update/password', [ProfileController::class, 'updatePasswordProf'])->name('profile.update.password');
    Route::patch('profile/update/email', [ProfileController::class, 'updateEmailProf'])->name('profile.update.email');
    Route::get('home/devoirs/create', [DevoirController::class, 'create'])->name('devoirs.create');
    Route::post('home/devoirs', [DevoirController::class, 'store'])->name('devoirs.store');
    Route::get('resultats/{id}', [ResultatController::class, 'show'])->name('resultats.show');
    Route::put('/resultats/{id}', [ResultatController::class, 'update'])->name('resultat.update');
    Route::get('home/devoirs/show', [DevoirController::class, 'showdevoir'])->name('devoirs.resultat.show');
    Route::get('devoirs/{id}/resultats', [ResultatController::class, 'resultat'])->name('resultats.index');
    Route::get('devoirs/{id}', [DevoirController::class, 'showProfDevoir'])->name('devoirs.show');

    Route::middleware('auth:professeur')->group(function () {
        Route::get('home', [DashboardController::class, 'indexprof'])->name('dashboard');
    });
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    // Ajoutez d’autres routes selon vos besoins
});

Route::resource('/admin/posts', AdminController::class)->except('show')->names('admin.posts');


Route::get('/',[AccueilController::class,'index'])->name('index');









