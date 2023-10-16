<?php

namespace App\Http\Controllers;

use App\Exceptions\RequestRulesException;
use Illuminate\Support\Facades\Validator;

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