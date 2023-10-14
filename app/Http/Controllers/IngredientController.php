<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Services\IngredientService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredientService = new IngredientService();
        $indexIngredient =  $ingredientService -> index();
        return new JsonResponse($indexIngredient, 201);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incomingFeilds = $request -> validate([
            'name' => 'required'
        ]);
        $ingredientService = new IngredientService();
        $createdIngredient =  $ingredientService -> create($incomingFeilds);

        $createdIngredientId  = $createdIngredient-> id ;
        return new JsonResponse(['message' => 'Recipe created successfully', 'id' => $createdIngredientId], 201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $IngredientService = new IngredientService();
        $showIngredient =  $IngredientService -> show($id);
        return new JsonResponse($showIngredient, 201);
    }

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
        $incomingFeilds = $request->validate([
            'name' => 'required',

        ]);
        $ingredientService = new IngredientService();
        $ingredientService -> update($incomingFeilds, $id);

        return new JsonResponse(['message' => 'Recipe updated successfully', 'id' => $id], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ingredientService = new IngredientService();
        $ingredientService -> delete($id);

        return new JsonResponse(['message' => 'Recipe deleted successfully', 'id' => $id], 201);
    }
}
