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
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id')->select('id');
    }
}