<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\GourmandController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ExperienceController;

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
// Route::get('/', function () {
//     return view('visiteur');
// })->name('visiteur');
Route::get('/', [VisiteurController::class, 'index'])->name('visiteur');

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

Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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

    // gestion des utilisateurs
    Route::patch('/users/{user}/approve', [AdminController::class, 'approveUser'])->name('admin.users.approve');
    Route::patch('/users/{user}/suspend', [AdminController::class, 'suspendUser'])->name('admin.users.suspend');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
});



// routes chef
Route::middleware(['auth', 'check.role:Chef'])->prefix('chef')->group(function () {
    Route::get('/dashboard', [ChefController::class, 'index'])->name('chef.dashboard');
});


// routes gourmand
Route::middleware(['auth', 'check.role:Gourmand'])->prefix('gourmand')->group(function () {
    Route::get('/accueil', [GourmandController::class, 'index'])->name('gourmand.accueil');
    Route::get('/recettes', [RecipeController::class, 'browse'])->name('gourmand.recettes');
    Route::get('/gourmand/carousel', [RecipeController::class, 'getTopCarousel'])->name('gourmand.carousel');

    // Routes pour les recettes
    Route::get('/recettes/{id}', [RecipeController::class, 'show'])->name('gourmand.recettes.show');

    // Routes pour Favoris
    Route::get('/mesfavoris', [FavoriteController::class, 'index'])->name('gourmand.mesfavoris');
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::post('/favorites/delete', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    // Route pour blog
    Route::get('/blog', [ThemeController::class, 'index'])->name('gourmand.blog');
    Route::get('/experiences/{theme}', [ExperienceController::class, 'index'])->name('gourmand.experiences');

    // Route pour experience
    Route::post('/experiences', [ExperienceController::class, 'store'])->name('experiences.store');
    Route::get('/experiences/detail/{id}', [ExperienceController::class, 'show'])->name('gourmand.experiences.show');
});
