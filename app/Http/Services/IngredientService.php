<?php

namespace App\Http\Services;

use App\Models\Ingredient;
use App\Models\OdataQueryBuilder;


class IngredientService
{
    public $ingredient;

    public function __construct(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    public static function index($parsedQuery)
    {
        $query = Ingredient::query();
        $result = OdataQueryBuilder::handle($parsedQuery, $query);
        return $result;
    }

    public function store($incomingFeilds)
    {
        return $this->ingredient->create($incomingFeilds);
    }

    public function show($id)
    {
        return $this->ingredient->findOrFail($id);
    }
    
    public function update($incomingFeilds, $id)
    {
        $ingre = $this->ingredient->findOrFail($id);
        $ingre->name = $incomingFeilds['name'];
        $ingre->update();
        return $this->ingredient->findOrFail($id);
    }

    public function delete($id)
    {
        $ingre = $this->ingredient->findOrFail($id);
        $ingre->delete();
        return $this->ingredient->findOrFail($id);
    }
}
