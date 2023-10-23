<?php

namespace App\Http\Controllers;

use App\Helpers\OdataQueryParser;
use App\Http\Requests\IndexRecipeIngredientRequest;
use App\Http\Requests\StoreRecipeIngredientRequest;
use App\Http\Requests\UpdateRecipeIngredientRequest;
use App\Http\Services\RecipeIngredientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecipeIngredientController extends Controller
{
    use RulesTrait;

    public $recipeIngredientService;

    public function __construct(RecipeIngredientService $recipeIngredientService)
    {
        $this->recipeIngredientService = $recipeIngredientService;
    }

    public function index(IndexRecipeIngredientRequest $request)
    {
        $parsedQuery = OdataQueryParser::parse($request->fullUrl());
        $result = $this->recipeIngredientService->index($parsedQuery);
        return $this->respondArrayResult($result);
    }

    public function store(StoreRecipeIngredientRequest $request)
    {
        $incomingFeilds = self::checkRules($request, RecipeIngredientController::class, 'store', 4000);
        $item = $this->recipeIngredientService->store($incomingFeilds);
        return $this->respondItemResult($item);
    }

    public function show(string $id)
    {
        $item = $this->recipeIngredientService->show($id);
        return $this->respondItemResult($item);
    }

    public function update(UpdateRecipeIngredientRequest $request, string $id)
    {
        $incomingFeilds = self::checkRules($request, RecipeIngredientController::class, 'update', 4000);
        $item = $this->recipeIngredientService->update($incomingFeilds, $id);
        return $this->respondItemResult($item);
    }

    public function destroy(string $id)
    {
        $item = $this->recipeIngredientService->delete($id);
        return $this->respondItemResult($item);
    }
}
