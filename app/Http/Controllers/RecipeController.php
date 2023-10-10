<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Psy\Command\WhereamiCommand;

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

    public function show(Request $request)
    {
        $info = Recipe::where('name',$request['name'])->get();
        return $info;
    }

    public function detail(Request $request)
    {
        $info = Recipe::where('name',$request);
    }
}
