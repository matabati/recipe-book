<?php

namespace App\Http\Controllers;

use App\Services\RecipeService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'hi!';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            
    }

    /*
    // i made it by my own self
    public function detail(Request $request)
    {
        $info = Recipe::where('id',$request['id']) -> get();
        $details = RecipeIngredient::where('recipe_id',$request['id']) -> get();
        return $info . $details ;
    }
    */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        @csrf_token();

        $incomingFields = $request->validate([
            'name' => 'required',
            'total_time' => ['required', 'date_format:H:i'],
            'image' => ['required', 'url'],
            'instruction' => 'required'

        ]);
        
        $recipeService = new RecipeService();
        $createdRecipe =  $recipeService -> create($incomingFields);

        $createdRecipeId  = $createdRecipe -> id ;
        return new JsonResponse(['message' => 'Recipe created successfully', 'id' => $createdRecipeId], 201);
    }

    /**
     * Display the specified resource.
     */
    /*
    public function show(string $id)
    {
        $info = Recipe::where('name',$request['name'])->get();
        return $info;
    }
    */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
