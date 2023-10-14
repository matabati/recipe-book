<?php

namespace App\Services;

use App\Models\RecipeIngredient;

class RecipeIngredientService {

    public function index()
    {
        return RecipeIngredient::all();
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