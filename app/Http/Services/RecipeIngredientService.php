<?php

namespace App\Http\Services;

use App\Models\RecipeIngredient;
use App\Models\OdataQueryBuilder;


class RecipeIngredientService
{
    public $recipeIngredient;

    public function __construct(RecipeIngredient $recipeIngredient)
    {
        $this->recipeIngredient = $recipeIngredient;
    }

    public static function index($parsedQuery)
    {
        $model = 'RecipeIngredient';
        $factory = new QueryFactory();
        $query = $factory->create($model)->createQuery();
        $result = OdataQueryBuilder::handle($parsedQuery, $query);
        return $result;
    }

    public function store($incomingFeilds)
    {
        return $this->recipeIngredient->create($incomingFeilds);
    }

    public function show($id)
    {
        return $this->recipeIngredient->findOrFail($id);
    }

    public function update($incomingFeilds, $id)
    {
        $recipeIngredient = $this->recipeIngredient->findOrFail($id);
        $recipeIngredient->recipe_id = $incomingFeilds['recipe_id'];
        $recipeIngredient->ingredient_id = $incomingFeilds['ingredient_id'];
        $recipeIngredient->unit = $incomingFeilds['unit'];
        $recipeIngredient->amount = $incomingFeilds['amount'];
        $recipeIngredient->necessity = $incomingFeilds['necessity'];
        $recipeIngredient->update();
        return $this->recipeIngredient->findOrFail($id);
    }

    public function delete($id)
    {
        $recipeIngredient = $this->recipeIngredient->indOrFail($id);
        $recipeIngredient->delete();
        return $this->recipeIngredient->findOrFail($id);
    }
}
