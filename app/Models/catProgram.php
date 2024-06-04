<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catProgram extends Model
{
    use HasFactory;
    protected $table = 'catProgram';
    protected $primaryKey = 'id_catProgram';

    protected $fillable = ['nama_catProgram'];
    public function program()
    {
        return $this->belongsToMany(Program::class, 'catProgram_program', 'category_id', 'program_id');
    }
}
