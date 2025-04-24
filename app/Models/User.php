<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function favoriteRecipes()
{
    return $this->belongsToMany(
        Recipe::class,
        'recipes_favoris',   // nom de la table pivot
        'user_id',           // clé étrangère vers users
        'recipe_id'          // clé étrangère vers recipe
    );
}
}