<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'materi';

    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id')->select('id', 'nama_kelas');
    }

    public function kontenMateri()
    {
        return $this->hasOne(KontenMateri::class);
    }
    public function questions_pretest()
    {
        return $this->hasMany(Question::class);
    }
    public function questions_postest()
    {
        return $this->hasMany(QuestionPostest::class);
    }
}