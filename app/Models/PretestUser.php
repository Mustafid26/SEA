<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PretestUser extends Model
{
    use HasFactory;
    protected $table = 'pretest_users';

    protected $fillable = [
        'user_id',
        'kelas_id',
        'is_passed',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Materi::class, 'kelas_id');
    }
}
