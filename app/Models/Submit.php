<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    use HasFactory;
    protected $table ='submitpenilaian';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
