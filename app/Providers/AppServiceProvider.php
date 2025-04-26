<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Auth\AuthRepositoryInterface;
use App\Repositories\Auth\AuthRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Recipe\RecipeRepository;
use App\Repositories\Recipe\RecipeRepositoryInterface;
use App\Repositories\Tag\TagRepository;
use App\Repositories\Tag\TagRepositoryInterface;
use App\Repositories\Favorite\FavoriteRepository;
use App\Repositories\Favorite\FavoriteRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(RecipeRepositoryInterface::class, RecipeRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
        $this->app->bind(FavoriteRepositoryInterface::class, FavoriteRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
