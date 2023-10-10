<?php

namespace App\Http\Controllers;

use App\Models\RecipeIngredient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RecipeIngredientController extends Controller
{
    
    public function add(Request $request){
        $incomingFeilds = $request -> validate([
            'recipe_id' => ['required', Rule::exists('recipes','id')],
            'ingredient_id'  => ['required', Rule::exists('ingredients','id')],
            'unit' => 'required',
            'amount' => 'required',
            'necessity' => 'required'
        ]);

        RecipeIngredient::create($incomingFeilds);
        return $request;
        
    }

}