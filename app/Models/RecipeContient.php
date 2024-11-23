<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecipeContient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ingredient_recipe';

    public $timestamps = true;

    protected $fillable = [
        'ingredient_id',
        'recipe_id',
    ];

    public function recipe()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function ingredient()
    {
        return $this->belongsToMany(Ingredient::class);
    }
}