<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PretestUser extends Model
{
    use HasFactory;
    protected $table = 'pretest_users';

    protected $guarded = ['id'];

    // public function getRecordTitleAttribute()
    // {
    //     return $this->user?->name ?? 'Pretest User';
    // }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id', 'id');
    }

    public function postestUser()
    {
        return $this->hasOne(PostestUser::class, 'user_id', 'user_id');
    }

    // public function getRecordTitleAttribute()
    // {
    //     return $this->user?->name ?? 'Pretest User';
    // }
}