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
    public function rombel()
    {
        return $this->belongsTo(Rombel::class)->select('id', 'name');
    }

}