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

    protected $keyType = 'string';
    public $incrementing = false;


    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id')->select('id', 'nama_kelas');
    }

    public function presensi()
    {
        return $this->hasOne(Presensi::class);
    }
    public function kontenMateri()
    {
        return $this->hasOne(KontenMateri::class);
    }
    public function pretestUsers()
    {
        return $this->hasMany(PretestUser::class);
    }
    public function pretestTakenByUser($userId)
    {
        return $this->pretestUsers()->where('user_id', $userId)->exists();
    }

    public function survey() {
        return $this->hasOne(Presensi::class, 'user_id', 'user_id');
    }
}