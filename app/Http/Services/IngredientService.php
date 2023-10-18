<?php

namespace App\http\Services;

use App\Models\Ingredient;
use App\Models\OdataQueryBuilder;


class IngredientService {

    public static function index($parsedQuery)
    {
        $query = Ingredient::query();
        $result = OdataQueryBuilder::handle($parsedQuery, $query);
        $result = $result -> get();
        return $result;
        
    }

    public function create($incomingFeilds)
    {
        return Ingredient::create($incomingFeilds);
    }

    public function show($id)
    {
        return Ingredient::find($id);
    }

    public function update($incomingFeilds, $id)
    {
        $ingre = Ingredient::find($id);
        $ingre->name = $incomingFeilds['name'];
        $ingre->update();
    }

    public function delete($id)
    {
        $ingre = Ingredient::find($id);
        $ingre->delete();
    }
}