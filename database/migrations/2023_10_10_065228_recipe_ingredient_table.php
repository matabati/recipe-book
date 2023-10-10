<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipe_ingredients',function(Blueprint $table){
            $table ->  id();
            $table -> unsignedBigInteger('recipe_id');
            $table -> foreign('recipe_id') -> references('id') -> on('recipes') ->onDelete('cascade');
            $table -> unsignedBigInteger('ingredient_id');
            $table -> foreign('ingredient_id') -> references('id') -> on('ingredients') ->onDelete('cascade');
            $table -> string('unit');
            $table -> float('amount');
            $table -> boolean('necessity');
            $table -> timestamp('created_at');
            $table -> timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
