<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RecipeContient;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ingredient';

    protected $fillable = [
        'name',
        'image',
        'prix_unitaire',
    ];

    public $timestamps = true;

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_contient', 'ingredient_id', 'recipe_id')->withTimestamps();
    }
}