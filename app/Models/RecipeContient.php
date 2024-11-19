<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecipeContient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'recipe_contient';

    public $timestamps = true;

    protected $fillable = [
        'id_ingredient',
        'id_recette',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }
}