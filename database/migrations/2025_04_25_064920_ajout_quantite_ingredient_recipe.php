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
        Schema::table('ingredient_recipe', function (Blueprint $table) {
            $table->integer('quantity')->after('ingredient_id');
            $table->string('unite', 50)->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ingredient_recipe', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropColumn('unite');
        });
    }
};
