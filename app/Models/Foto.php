<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;
    protected $table = 'foto';

    public static function boot()
    {
        parent::boot();

        static::created(function () {
            Cache::forget('photos');
        });

        static::updated(function () {
            Cache::forget('photos');
        });

        static::deleted(function () {
            Cache::forget('photos');
        });
    }
}