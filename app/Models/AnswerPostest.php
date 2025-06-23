<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerPostest extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'answers_postest';
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'name');
    }
    public function question()
    {
        return $this->belongsTo(QuestionPostest::class, 'question_id')->select('id', 'question');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id')->select('id', 'nama_kelas');
    }
    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id')->select('id');
    }
}