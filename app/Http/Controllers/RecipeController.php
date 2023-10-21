<?php

namespace App\Http\Controllers;

use App\Helpers\OdataQueryParser;
use App\Http\Services\RecipeService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RecipeController extends Controller
{
    use RulesTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $parsedQuery = OdataQueryParser::parse($request->fullUrl());
        $result = RecipeService::index($parsedQuery);
        return response() -> json($result);
        
        //$user_id = $request -> header('x-user-id');
        //return $parsedQuery;
        //$data = self::checkRules($request, RecipeController::class, 'index', 4001);
        //return $this->respondArrayResult ($items['value'], $items['count']);
        // $recipeService = new RecipeService();
        // $indexRecipe =  $recipeService -> index();
        
        // return new JsonResponse($indexRecipe, 201);
    }

    /**
     * Show the form for creating a new resource.
     */
    /*
    public function create()
    {
            
    }
    */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incomingFields = self::checkRules($request, RecipeController::class, 'store', 4000);

        $recipeService = new RecipeService();
        $createdRecipe =  $recipeService -> create($incomingFields);

        $createdRecipeId  = $createdRecipe -> id ;
        return new JsonResponse(['message' => 'Recipe created successfully', 'id' => $createdRecipeId], 201);
    }

    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        //return 'show';
        $recipeService = new RecipeService();
        $showRecipe =  $recipeService -> show($id);
        return new JsonResponse($showRecipe, 201);
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
        $incomingFields = self::checkRules($request, RecipeController::class, 'update', 4000);

        $recipeService = new RecipeService();
        $recipeService -> update($incomingFields, $id);

        return new JsonResponse(['message' => 'Recipe updated successfully', 'id' => $id], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //return 'destroy';
        $recipeService = new RecipeService();
        $recipeService -> delete($id);

        return new JsonResponse(['message' => 'Recipe deleted successfully', 'id' => $id], 201);
    }
}
