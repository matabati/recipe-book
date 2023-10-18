<?php

namespace App\http\Services;

use App\Models\RecipeIngredient;
use App\Models\OdataQueryBuilder;


class RecipeIngredientService {

    public static function index($parsedQuery)
    {
        $query = RecipeIngredient::query();
        $result = OdataQueryBuilder::handle($parsedQuery, $query);
        $result = $result -> get();
        return $result;
    }

    public function create($incomingFeilds)
    {
        return RecipeIngredient::create($incomingFeilds);
    }

    public function show($id)
    {
        return RecipeIngredient::find($id);
    }

    public function update($incomingFeilds, $id)
    {
        $recipeIngredient = RecipeIngredient::find($id);
        $recipeIngredient->update($incomingFeilds);
    }

    public function delete($id)
    {
        $recipeIngredient = RecipeIngredient::find($id);
        $recipeIngredient->delete();
    }
}