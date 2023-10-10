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
        Schema::create('recipes',function(Blueprint $table){
            $table ->  id();
            $table -> string('name');
            $table -> time('total_time');
            $table -> string('image');
            $table -> longText('instruction');
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
