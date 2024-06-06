<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritedRecipe extends Model
{
    use HasFactory;

    protected $table = 'favorited_recipes';

    protected $fillable = [
        'user_id',
        'recipe_id',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}