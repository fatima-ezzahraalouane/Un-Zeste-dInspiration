<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\GourmandController;
use App\Http\Controllers\RecipeController;

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

// Page d'accueil
Route::get('/', function () {
    return view('visiteur');
})->name('visiteur');

// Connexion
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Inscription
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Forgot Password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');

Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::post('/login',[AuthController::class, 'login'])->name('login.store');

// Afficher formulaire email
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot-password');

// Envoyer l’email de réinitialisation
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Afficher formulaire de nouveau mot de passe
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Enregistrer le nouveau mot de passe
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');




// routes admin
Route::middleware(['auth', 'check.role:Admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});



// routes chef
Route::middleware(['auth', 'check.role:Chef'])->prefix('chef')->group(function () {
    Route::get('/dashboard', [ChefController::class, 'index'])->name('chef.dashboard');
});


// routes gourmand
Route::middleware(['auth', 'check.role:Gourmand'])->prefix('gourmand')->group(function () {
    Route::get('/accueil', [GourmandController::class, 'index'])->name('gourmand.accueil');
    Route::get('/recettes-top', [RecipeController::class, 'topForGourmand'])->name('recipes.top.gourmand');
});



// Route::get('/top-recipes/visiteur', [RecipeController::class, 'topForVisiteur'])->name('recipes.top.visiteur');
// Route::get('/top-recipes/gourmand', [RecipeController::class, 'topForGourmand'])->name('recipes.top.gourmand');
// Route::get('/carousel/recettes', [RecipeController::class, 'topForCarousel'])->name('recipes.carousel');