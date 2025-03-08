<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pelatihans';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'admin_id', // Tambahkan ini
    ];
    
    public function author()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}