<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function kontenMateri()
    {
        return $this->hasMany(KontenMateri::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

