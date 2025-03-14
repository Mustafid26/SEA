<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'foto';

    protected $guarded = ['id'];

    // protected $fillable = [
    //     'title',
    //     'desc',
    //     'image',
    // ];

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