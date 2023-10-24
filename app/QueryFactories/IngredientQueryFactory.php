<?php

namespace App\QueryFactories;

use App\Contracts\QueryFactoryInterface;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Builder;

class IngredientQueryFactory implements  QueryFactoryInterface
{
    public function createQuery(): Builder
    {
        return Ingredient::query();
    }
}