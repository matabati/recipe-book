<?php

namespace App\Services;

use App\Models\Ingredient;

class IngredientService {

    public function create($incomingFeilds)
    {
        return Ingredient::create($incomingFeilds);
    }
}