<?php

namespace App\QueryFactories;

use App\Contracts\QueryFactoryInterface;
use App\Models\RecipeIngredient;
use Illuminate\Database\Eloquent\Builder;

class RecipeIngredientQueryFactory implements QueryFactoryInterface
{
    public function createQuery(): Builder
    {
        return RecipeIngredient::query();
    }
}