<?php

namespace App\Http\Controllers;

use App\Helpers\OdataQueryParser;
use App\Http\Services\RecipeService;
use App\Http\Requests\IndexRecipeRequest;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;

class RecipeController extends ApiController
{
    use RulesTrait;
    
    public $recipeService;

    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }

    public function index(IndexRecipeRequest $request)
    {
        $parsedQuery = OdataQueryParser::parse($request->fullUrl());
        $result = $this->recipeService->index($parsedQuery);
        return $this->respondArrayResult($result);
    }

    public function store(StoreRecipeRequest $request)
    {
        $incomingFields = self::checkRules($request, RecipeController::class, 'store', 4000);

        /*
        if ($validation->fails()) {
            $response= [
                "status" => 400,
                "code" =>   5001,
                "message" => "some fields not sent or empty or wrong",
                "fields" => [
                    $validation->errors()
                ]
            ];
            return response()->json($response)->setStatusCode(400);
        }
        */
        
        $item = $this->recipeService->store($incomingFields);
        return $this->respondItemResult($item);
    }

    
    public function show(string $id)
    {
        $item = $this->recipeService->show($id);
        return $this->respondItemResult($item);
    }

    
    public function update(UpdateRecipeRequest $request, string $id)
    {
        $incomingFields = self::checkRules($request, RecipeController::class, 'update', 4000);
        $item = $this->recipeService->update($incomingFields, $id);
        return $this->respondItemResult($item);
    }

    
    public function destroy(string $id)
    {
        $item = $this->recipeService->delete($id);
        return $this->respondItemResult($item);
    }
}
