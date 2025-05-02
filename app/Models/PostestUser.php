<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostestUser extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'postest_users';
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
}