<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\GourmandController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipePdfController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

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


Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');





// routes admin
Route::middleware(['auth', 'check.role:Admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // gestion des utilisateurs
    Route::patch('/users/{user}/approve', [AdminController::class, 'approveUser'])->name('admin.users.approve');
    Route::patch('/users/{user}/suspend', [AdminController::class, 'suspendUser'])->name('admin.users.suspend');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // Modération de contenu
    Route::get('/content-moderation', [AdminController::class, 'moderateContent'])->name('admin.content');

    Route::patch('/recipes/{recipe}/approve', [AdminController::class, 'approveRecipe'])->name('admin.recipes.approve');
    Route::patch('/recipes/{recipe}/reject', [AdminController::class, 'rejectRecipe'])->name('admin.recipes.reject');

    Route::patch('/experiences/{experience}/approve', [AdminController::class, 'approveExperience'])->name('admin.experiences.approve');
    Route::patch('/experiences/{experience}/reject', [AdminController::class, 'rejectExperience'])->name('admin.experiences.reject');

    // Gestion des catégories
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Gestion des tags
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');

    // Gestion des thèmes
    Route::post('/themes', [ThemeController::class, 'store'])->name('themes.store');
    Route::put('/themes/{theme}', [ThemeController::class, 'update'])->name('themes.update');
    Route::delete('/themes/{theme}', [ThemeController::class, 'destroy'])->name('themes.destroy');
});




// routes chef
Route::middleware(['auth', 'check.role:Chef'])->prefix('chef')->group(function () {
    Route::get('/dashboard', [ChefController::class, 'profile'])->name('chef.dashboard');
    Route::put('/dashboard/update', [ChefController::class, 'updateProfile'])->name('chef.dashboard.update');

    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::put('/recipes/{id}/update', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    Route::put('/profil/password', [ProfileController::class, 'updatePassword'])->name('dashboard.update-password');
});


// routes gourmand
Route::middleware(['auth', 'check.role:Gourmand'])->prefix('gourmand')->group(function () {
    Route::get('/accueil', [GourmandController::class, 'index'])->name('gourmand.accueil');
    Route::get('/recettes', [RecipeController::class, 'browse'])->name('gourmand.recettes');

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
    Route::put('/experiences/{id}/update', [ExperienceController::class, 'update'])->name('experiences.update');
    Route::delete('/experiences/{id}', [ExperienceController::class, 'destroy'])->name('experiences.destroy');

    // Routes pour les commentaires (gourmand)
    Route::prefix('commentaires')->name('commentaires.')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('index');
        Route::post('/store', [CommentController::class, 'store'])->name('store');
        Route::put('/{id}/update', [CommentController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [CommentController::class, 'destroy'])->name('destroy');
    });

    // Route pour profil
    Route::get('/profile', [GourmandController::class, 'profile'])->name('gourmand.profile');
    Route::put('/profile/update', [GourmandController::class, 'updateProfile'])->name('gourmand.profile.update');
    Route::put('/profil/password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    // Route pour PDF
    Route::get('/recipes/{id}/pdf', [RecipePdfController::class, 'download'])->name('recipes.pdf');
});
