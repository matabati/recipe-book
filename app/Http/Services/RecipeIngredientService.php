<?php

namespace App\Http\Services;

use App\Models\RecipeIngredient;
use App\Models\OdataQueryBuilder;


class RecipeIngredientService
{

    public static function index($parsedQuery)
    {
        $query = RecipeIngredient::query();
        $result = OdataQueryBuilder::handle($parsedQuery, $query);
        return $result;
    }

    public function store($incomingFeilds)
    {
        return RecipeIngredient::create($incomingFeilds);
    }

    public function show($id)
    {
        return RecipeIngredient::findOrFail($id);
    }

    public function update($incomingFeilds, $id)
    {
        $recipeIngredient = RecipeIngredient::findOrFail($id);
        $recipeIngredient->recipe_id = $incomingFeilds['recipe_id'];
        $recipeIngredient->ingredient_id = $incomingFeilds['ingredient_id'];
        $recipeIngredient->unit = $incomingFeilds['unit'];
        $recipeIngredient->amount = $incomingFeilds['amount'];
        $recipeIngredient->necessity = $incomingFeilds['necessity'];
        $recipeIngredient->update();
    }

    public function delete($id)
    {
        $recipeIngredient = RecipeIngredient::findOrFail($id);
        $recipeIngredient->delete();
    }
}
