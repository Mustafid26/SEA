<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
    public function kontenMateri()
    {
        return $this->hasMany(KontenMateri::class);
    }
    public function pretestUsers()
    {
        return $this->hasMany(PretestUser::class);
    }
    public function pretestTakenByUser($userId)
    {
        return $this->pretestUsers()->where('user_id', $userId)->exists();
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function questions_postest()
    {
        return $this->hasMany(QuestionPostest::class);
    }
}

