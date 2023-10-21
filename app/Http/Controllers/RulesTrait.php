<?php

namespace App\Http\Controllers;

use App\Exceptions\RequestRulesException;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


trait RulesTrait
{

    public static function rules()
    {
        return [
            RecipeController::class => [
                'index' => [
                    'name' => 'required',
                    'total_time' => ['required', 'date_format:H:i'],
                    'image' => ['required', 'url'],
                    'instruction' => 'required'
                ],
                'store' => [
                    'name' => 'required',
                    'total_time' => ['required', 'date_format:H:i'],
                    'image' => ['required', 'url'],
                    'instruction' => 'required'
                ],
                'show' => [
                    
                ],
                'update' => [
                    'name' => 'required',
                    'total_time' => ['required', 'date_format:H:i'],
                    'image' => ['required', 'url'],
                    'instruction' => 'required'
                ],
                'destroy' => [

                ]
            ],
            RecipeIngredientController::class => [
                'index' => [
                    'recipe_id' => ['required', Rule::exists('recipes','id')],
                    'ingredient_id'  => ['required', Rule::exists('ingredients','id')],
                    'unit' => 'required',
                    'amount' => 'required',
                    'necessity' => 'required'
                ],
                'store' => [
                    'recipe_id' => ['required', Rule::exists('recipes','id')],
                    'ingredient_id'  => ['required', Rule::exists('ingredients','id')],
                    'unit' => 'required',
                    'amount' => 'required',
                    'necessity' => 'required'
                ],
                'show' => [
                    
                ],
                'update' => [
                    'recipe_id' => ['required', Rule::exists('recipes','id')],
                    'ingredient_id'  => ['required', Rule::exists('ingredients','id')],
                    'unit' => 'required',
                    'amount' => 'required',
                    'necessity' => 'required'
                ],
                'destroy' => [

                ]
            ],
            Ingredient::class => [
                'store' => [
                    'name' => 'required',
                ],
                'update' => [
                    'name' => 'required',
                ]
            ]
        ];
    }

    public static function checkRules($data, $class, $function, $code)
    {
        if(is_object($data)) {
            $validate = Validator::make(
                $data->all(),
                self::rules()[$class][$function]
            );
        } else {
            $validate = Validator::make(
                $data,
                self::rules()[$class][$function]
            );
        }
        
        if ($validate->fails()) {
            // dd($validate->errors());
            throw new RequestRulesException($validate->errors(), $code);
        }

        return $validate->validated();
    }

}