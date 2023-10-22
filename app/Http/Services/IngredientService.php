<?php

namespace App\Http\Services;

use App\Models\Ingredient;
use App\Models\OdataQueryBuilder;


class IngredientService
{

    public static function index($parsedQuery)
    {
        $query = Ingredient::query();
        $result = OdataQueryBuilder::handle($parsedQuery, $query);
        return $result;
    }

    public function store($incomingFeilds)
    {
        return Ingredient::create($incomingFeilds);
    }

    public function show($id)
    {
        return Ingredient::findOrFail($id);
    }
    
    public function update($incomingFeilds, $id)
    {
        $ingre = Ingredient::findOrFail($id);
        $ingre->name = $incomingFeilds['name'];
        $ingre->update();
    }

    public function delete($id)
    {
        $ingre = Ingredient::findOrFail($id);
        $ingre->delete();
    }
}
