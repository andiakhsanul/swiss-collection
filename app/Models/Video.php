<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $primaryKey = 'id_video';

    protected $fillable = ['judul_video', 'deskripsi_video', 'gambar_video','url_video', 'durasi_video'];

    public function categories()
    {
        return $this->belongsToMany(CategoriesVideo::class, 'categories_video_video', 'video_id', 'category_id');
    }
    public function program()
    {
        return $this->belongsToMany(Program::class, 'program_video', 'video_id', 'program_id');
    }
}

