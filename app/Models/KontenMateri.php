<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenMateri extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'konten_materi';

    protected $guarded = ['id'];
    public function materi()
    {
        return $this->belongsTo(Materi::class)->select('id', 'judul_materi', 'kelas_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class)->select('id', 'question', 'option1', 'option2', 'option3', 'option4', 'correct_answer');
    }
    public function questions_postest()
    {
        return $this->hasMany(QuestionPostest::class)->select('id', 'question', 'option1', 'option2', 'option3', 'option4', 'correct_answer');
    }

}