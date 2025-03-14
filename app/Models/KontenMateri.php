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
        return $this->belongsTo(Materi::class, 'materi_id')->select('id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class, 'q_pretest_id')->select('id');
    }
    public function questions_postest()
    {
        return $this->hasMany(QuestionPostest::class,'q_postest_id')->select('id');
    }
    public function pdf()   
    {
        return $this->belongsTo(Pdf::class, 'id');
    }

}