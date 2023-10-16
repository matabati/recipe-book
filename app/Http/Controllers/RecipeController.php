<?php

namespace App\Http\Controllers;

use App\Helpers\OdataQueryParser;
use App\Exceptions\RequestRulesException;

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
        //return 'index';
        //$data = self::checkRules($request, RecipeController::class, 'index', 4001);
        
        //$user_id = $request -> header('x-user-id');

        $query = OdataQueryParser::parse($request->fullUrl());
        $items = RecipeService::indexSearch($query);
        return $this->respondArrayResult ($items['value'], $items['count']);
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
        //return 'store';
        $incomingFields = $request->validate([
            

        ]);
        
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
        $incomingFields = $request->validate([
            'name' => 'required',
            'total_time' => ['required', 'date_format:H:i'],
            'image' => ['required', 'url'],
            'instruction' => 'required'

        ]);

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
