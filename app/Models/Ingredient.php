<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\IngredientRecipe;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class);
    }
}