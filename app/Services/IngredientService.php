<?php

namespace App\Services;

use App\Models\Ingredient;

class IngredientService {

    public function index()
    {
        return Ingredient::all();
    }

    public function create($incomingFeilds)
    {
        return Ingredient::create($incomingFeilds);
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