<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Run the migrations.

    public function up()
    {
        Schema::create('recipe_contient', function (Blueprint $table) {
            $table->id();

            // Clés étrangères
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('ingredient_id');

            $table->foreign('recipe_id')->references('id')->on('recipe');

            $table->foreign('ingredient_id')->references('id')->on('ingredient');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    // Reverse the migrations.

    public function down()
    {
        Schema::dropIfExists('recipe_contient');
    }
};
