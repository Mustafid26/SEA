<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    protected static function boot()
    {
        parent::boot();

        // Closure ini akan menaikkan nomor versi cache untuk rombel terkait
        $incrementCacheVersion = function (Kelas $model) {
            if ($model->rombel_id) {
                // 1. Definisikan kunci untuk menyimpan versi cache rombel
                $versionKey = 'kelas_version_rombel_' . $model->rombel_id;

                // 2. Naikkan nomor versi setiap ada perubahan
                Cache::increment($versionKey);
            }
        };

        // Panggil closure pada setiap event perubahan data
        static::created($incrementCacheVersion);
        static::updated($incrementCacheVersion);
        static::deleted($incrementCacheVersion);
    }


}