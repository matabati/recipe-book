<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngrediant extends Model
{
    use HasFactory;
    protected $fillable = [
        'recipe_id', 'ingrediant_id', 'unit', 'amount', 'necessity'
    ];
}
