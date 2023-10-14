<?php

namespace App\Services;

use App\Models\Recipe;

class RecipeService {

    public function index()
    {
        return Recipe::all();
    }

    public function create($incomingFeilds)
    {
        return Recipe::create($incomingFeilds);
    }

    public function show($id)
    {
        return Recipe::find($id);
    }

    public function update($incomingFeilds, $id)
    {
        $recipe = Recipe::find($id);
        $recipe->name = $incomingFeilds['name'];
        $recipe ->total_time = $incomingFeilds['total_time'];
        $recipe->image = $incomingFeilds['image'];
        $recipe->instruction = $incomingFeilds['instruction'];
        $recipe->update();
    }

    public function delete($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
    }
}