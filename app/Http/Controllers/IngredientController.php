<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function add(Request $request){

        $incomingFeilds = $request -> validate([
            'name' => 'required'
        ]);
        Ingredient::create($incomingFeilds);
        return $request;
    }
}
