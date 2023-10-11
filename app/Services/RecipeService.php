<?php

namespace App\Services;

use App\Models\Recipe;

class RecipeService {

    public function create($incomingFeilds)
    {
        return Recipe::create($incomingFeilds);
    }
}