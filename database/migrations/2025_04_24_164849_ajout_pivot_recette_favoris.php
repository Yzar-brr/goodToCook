<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes_favoris', function (Blueprint $table) {
            // Clés étrangères
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('recipe_id');

            // Optionnel : timestamp pour savoir quand le favori a été créé
            $table->timestamps();

            // Clé primaire composite pour éviter les doublons
            $table->primary(['user_id', 'recipe_id']);

            // Index et contrainte de clé étrangère
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('recipe_id')
                  ->references('id')
                  ->on('recipe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes_favoris', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['recipe_id']);
        });
        Schema::dropIfExists('recipes_favoris');
    }
};

