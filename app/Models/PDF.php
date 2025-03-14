<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDF extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    
    public function kontenMateri()
    {
        return $this->hasOne(KontenMateri::class, 'pdf_id', 'id');
    }
}
