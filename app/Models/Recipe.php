<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'recipe';

    protected $fillable = [
        'id',
        'temps',
        'ingredient',
        'consigne',
        'name',
        'description',
        'created_by',
        'confirmed',
    ];

    public $timestamps = false;

    public function ingredient(){
        return $this->belongsToMany(Ingredient::class, 'recipe_contient', 'ingredient_id');
    }

    
}