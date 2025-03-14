<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'penilaian';

    // protected $fillable = [
    //     'judul',
    //     'detail',
    //     'image',
    // ];

    protected $guarded = ['id'];

    public function rombel()
    {
        return $this->belongsTo(Rombel::class)->select('id', 'name');
    }
}