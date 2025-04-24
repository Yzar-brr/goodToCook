<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Ingredient;
use App\Models\User;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'recipe';

    protected $fillable = [
        'temps',
        'ingredient',
        'consigne',
        'image',
        'name',
        'description',
        'created_by',
        'confirmed',
    ];

    public $timestamps = true;

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class);
    }


    public function favoritedByUsers()
{
    return $this->belongsToMany(
        User::class,
        'recipes_favoris',
        'recipe_id',
        'user_id'
    );
}

public function isFavoritedBy(User $user = null): bool
{
    $user = $user ?: auth()->user();
    if (! $user) {
        return false;
    }
    // On interroge directement la relation pivot
    return $this->favoritedByUsers()
                ->wherePivot('user_id', $user->id)
                ->exists();
}
    
}