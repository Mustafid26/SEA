<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPostest extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'questions_postest';
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}