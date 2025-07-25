<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];
    protected $table = 'artikel';

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function author()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Closure ini akan dijalankan setiap kali ada perubahan pada model Artikel.
        $incrementCacheVersion = function () {
            // Kunci ini bertindak sebagai 'nomor versi' global untuk semua cache terkait artikel.
            // Setiap kali ada artikel dibuat, diubah, atau dihapus, nomor ini akan bertambah.
            Cache::increment('artikel_version');
        };

        // Daftarkan closure untuk event-event berikut:
        static::created($incrementCacheVersion);
        static::updated($incrementCacheVersion);
        static::deleted($incrementCacheVersion);
    }
}