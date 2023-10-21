<?php

namespace App\Http\Controllers;

use App\Helpers\OdataQueryParser;
use Illuminate\Validation\Rule;
use App\Http\Services\RecipeIngredientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecipeIngredientController extends Controller
{
    use RulesTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $parsedQuery = OdataQueryParser::parse($request->fullUrl());
        $result = RecipeIngredientService::index($parsedQuery);
        return response() -> json($result);
    }

    /**
     * Show the form for creating a new resource.
     */
    /*
    public function create()
    {
        //
    }
    */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incomingFeilds = self::checkRules($request, RecipeIngredientController::class, 'store', 4000);


        $recipeIngredientService = new RecipeIngredientService();
        $createdRecipeIngredient =  $recipeIngredientService -> create($incomingFeilds);

        $createdRecipeIngredientId  = $createdRecipeIngredient -> id ;
        return new JsonResponse(['message' => 'Recipe-Ingredient created successfully', 'id' => $createdRecipeIngredientId], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipeIngredientService = new RecipeIngredientService();
        $showRecipeIngredient =  $recipeIngredientService -> show($id);
        return new JsonResponse($showRecipeIngredient, 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    /*
    public function edit(string $id)
    {
        //
    }
    */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $incomingFeilds = self::checkRules($request, RecipeIngredientController::class, 'update', 4000);

        $recipeIngredientService = new RecipeIngredientService();
        $recipeIngredientService -> update($incomingFeilds, $id);
        return new JsonResponse(['message' => 'Recipe-Ingredient updated successfully', 'id' => $id], 201);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipeIngredientService = new RecipeIngredientService();
        $recipeIngredientService -> delete($id);

        return new JsonResponse(['message' => 'Recipe-Ingredient deleted successfully', 'id' => $id], 201);
    }
}
