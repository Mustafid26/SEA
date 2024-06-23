<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPostest extends Model
{
    use HasFactory;
    protected $table = 'questions_postest';
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
