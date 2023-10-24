<?php

namespace App\QueryFactories;

class QueryFactory
{
    public function create($model)
    {
        switch ($model){
            case 'Recipe':
                return new RecipeQueryFactory();
            case 'Ingredient':
                return new IngredientQueryFactory();
            case 'RecipeIngredient':
                return new RecipeIngredientQueryFactory();
            default:
                throw new \InvalidArgumentException("Invalid model: $model");
        }
    }
}