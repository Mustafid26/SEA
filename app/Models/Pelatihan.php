<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $table = 'pelatihans';
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}