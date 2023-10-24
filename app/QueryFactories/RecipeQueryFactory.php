<?php

namespace App\QueryFactories;

use App\Contracts\QueryFactoryInterface;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Recipe;

class RecipeQueryFactory implements QueryFactoryInterface
{
    public function createQuery(): Builder
    {
        return Recipe::query();
    }
}