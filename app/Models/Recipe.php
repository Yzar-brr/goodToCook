<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\RecipeContient;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'recipe';

    protected $fillable = [
        'temps',
        'ingredient',
        'consigne',
    ];

    public $timestamps = false;

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_contient', 'recipe_id', 'ingredient_id')->withTimestamps();
    }
}