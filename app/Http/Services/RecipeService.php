<?php

namespace App\Http\Services;

use App\Models\Recipe;
use App\Models\OdataQueryBuilder;
use App\QueryFactories\QueryFactory;

class RecipeService
{
    public $recipe;

    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }
    
    public static function index($parsedQuery)
    {
        $model = 'Recipe';
        $factory = new QueryFactory();
        $query = $factory->create($model)->createQuery();
        $result = OdataQueryBuilder::handle($parsedQuery, $query);
        return $result;
    }

    public function store($incomingFeilds)
    {
        return $this->recipe->create($incomingFeilds);
    }

    public function show($id)
    {
        return $this->recipe->findOrFail($id);
    }

    public function update($incomingFeilds, $id)
    {
        $recipe = $this->recipe->findOrFail($id);
        $recipe->name = $incomingFeilds['name'];
        $recipe->total_time = $incomingFeilds['total_time'];
        $recipe->image = $incomingFeilds['image'];
        $recipe->instruction = $incomingFeilds['instruction'];
        $recipe->update();
        return $this->recipe->findOrFail($id);
    }

    public function delete($id)
    {
        $recipe = $this->recipe->findOrFail($id);
        $recipe->delete();
        return $this->recipe->findOrFail($id);
    }
}
