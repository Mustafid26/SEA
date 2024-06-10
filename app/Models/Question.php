<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // Relasi many-to-one antara Question dan Materi
    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
