<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function add(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required',
            'total_time' => ['required', 'date_format:H:i'],
            'image' => ['required', 'url'],
            'instruction' => 'required'

        ]);
        Recipe::create($incomingFields);
        return $request;
    }
}
