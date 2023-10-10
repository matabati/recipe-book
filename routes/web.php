<?php

use App\Http\Controllers\RecipeController;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/recipe/all', function () {
    $rec = Recipe::all();
    return $rec;
});

Route::get('ingerdient/all', function () {
    $ing =  Ingredient::all();
    return $ing;
});

