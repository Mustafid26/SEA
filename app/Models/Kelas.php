<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'kelas';
    protected $guarded = ['id'];
    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
    public function pretestUsers()
    {
        return $this->hasMany(PretestUser::class);
    }
    public function pretestTakenByUser($userId)
    {
        return $this->pretestUsers()->where('user_id', $userId)->exists();
    }
    public function rombel()
    {
        return $this->belongsTo(Rombel::class)->select('id', 'name');
    }

}