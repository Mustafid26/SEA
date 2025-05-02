<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'presensi';
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id')->select('id', 'judul_materi');
    }

    // public function presensi() {
    //     return $this->hasOne(Presensi::class, 'user_id', 'user_id');
    // }
}