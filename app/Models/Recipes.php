<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;

    protected $fillable = [
        'temps',
        'ingredient_1',
        'consignes',
    ];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
