<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catRecipe extends Model
{
    use HasFactory;
    protected $table = 'catRecipe';
    protected $primaryKey = 'id_catRecipe';

    protected $fillable = ['nama_catRecipe'];
    public function recipe()
    {
        return $this->belongsToMany(recipe::class, 'catRecipe_recipe', 'category_id', 'recipe_id');
    }
    
}

