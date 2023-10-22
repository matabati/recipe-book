<?php

namespace App\Http\Services;

use App\Models\Recipe;
use App\Models\OdataQueryBuilder;

class RecipeService
{

    public static function index($parsedQuery)
    {
        $query = Recipe::query();
        $result = OdataQueryBuilder::handle($parsedQuery, $query);
        return $result;
    }


    public function store($incomingFeilds)
    {
        return Recipe::create($incomingFeilds);
    }

    public function show($id)
    {
        return Recipe::findOrFail($id);
    }

    public function update($incomingFeilds, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->name = $incomingFeilds['name'];
        $recipe->total_time = $incomingFeilds['total_time'];
        $recipe->image = $incomingFeilds['image'];
        $recipe->instruction = $incomingFeilds['instruction'];
        $recipe->update();
    }

    public function delete($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
    }
}
