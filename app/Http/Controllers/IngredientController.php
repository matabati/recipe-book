<?php

namespace App\Http\Controllers;

use App\Helpers\OdataQueryParser;
use App\Http\Requests\IndexIngredientRequest;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Http\Services\IngredientService;
use App\Http\Controllers\ApiController;

class IngredientController extends Controller
{
    use RulesTrait;

    public $ingredientService;

    public function __construct(IngredientService $ingredientService)
    {
        $this->ingredientService = $ingredientService;
    }

    public function index(IndexIngredientRequest $request)
    {
        $parsedQuery = OdataQueryParser::parse($request->fullUrl());
        $result = $this->ingredientService->index($parsedQuery);
        return $this->respondArrayResult($result);
    }

    public function store(StoreIngredientRequest $request)
    {
        $incomingFeilds = self::checkRules($request, IngredientController::class, 'store', 4000);
        $item = $this->ingredientService->store($incomingFeilds);
        return $this->respondItemResult($item);
    }

    public function show(string $id)
    {
        $item = $this->ingredientService->show($id);
        return $this->respondItemResult($item);
    }

    public function update(UpdateIngredientRequest $request, string $id)
    {
        $incomingFeilds = self::checkRules($request, IngredientController::class, 'update', 4000);
        $item = $this->ingredientService->update($incomingFeilds, $id);
        return $this->respondItemResult($item);
    }

    public function destroy(string $id)
    {
        $item = $this->ingredientService->delete($id);
        return $this->respondItemResult($item);
    }
}
