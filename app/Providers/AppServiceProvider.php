<?php

namespace App\Providers;

use App\Http\Services\IngredientService;
use App\Http\Services\RecipeIngredientService;
use App\Http\Services\RecipeService;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RecipeService::class, function (Application $app){
            return new RecipeService($app->make(Recipe::class));
        });

        $this->app->bind(IngredientService::class, function(Application $app){
            return new IngredientService($app->make(Ingredient::class));
        });

        $this->app->bind(RecipeIngredientService::class, function(Application $app){
            return new  RecipeIngredientService($app->make(RecipeIngredient::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
