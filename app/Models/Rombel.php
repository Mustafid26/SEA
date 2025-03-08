<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'rombels';

    protected $fillable = [
        'name',
        'city'
    ];

    public function kelas(): mixed
    {
        return $this->hasMany(Kelas::class);
    }

    public function penilaian(): mixed
    {
        return $this->hasOne(Penilaian::class);
    }

    public function user(): mixed
    {
        return $this->hasMany(User::class);
    }

}
