<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'program';
    protected $primaryKey = 'id_program';

    protected $fillable = ['nama_program', 'deskripsi', 'durasi_program', 'menit_per_hari'];
    public function categories()
    {
        return $this->belongsToMany(catProgram::class, 'catprogram_program', 'program_id', 'category_id');
    }
    public function video()
    {
        return $this->belongsToMany(Video::class, 'program_video', 'program_id', 'video_id');
    }
}
