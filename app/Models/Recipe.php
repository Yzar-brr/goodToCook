<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Ingredient;

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

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class);
    }

    
}