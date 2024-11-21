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
        'id',
        'name',
        'image',
        'prix_unitaire',
    ];

    public $timestamps = true;

    public function recipe(){
        return $this->belongsToMany(Recipe::class, 'recipe_id');
    }
}