<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    use HasFactory;
    protected $table = 'recipe';
    protected $primaryKey = 'id_recipe';

    protected $fillable = ['judul_recipe', 'deskripsi_recipe', 'gambar_recipe','url_recipe', 'bahan_recipe','cara_masak', 'durasi_recipe'];
    public function categories()
    {
        return $this->belongsToMany(catRecipe::class, 'catRecipe_recipe', 'recipe_id', 'category_id');
    }
}