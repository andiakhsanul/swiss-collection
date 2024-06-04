<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesVideo extends Model
{
    use HasFactory;
    protected $table = 'categories_video';
    protected $primaryKey = 'id_categories_video';

    protected $fillable = ['nama_categories_video'];
    public function video()
    {
        return $this->belongsToMany(Video::class, 'categories_video_video', 'category_id', 'video_id');
    }
}