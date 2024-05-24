<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Kelas::create([
            'nama_kelas' => 'Bu Ipah',
            'detail_kelas' => 'Industri Sampah'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Peri',
            'detail_kelas' => 'Perlindungan Diri'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Asih',
            'detail_kelas' => 'Anak Sehat Ibu Hebat'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Septi',
            'detail_kelas' => 'Sehat Pangan Sarat Gizi'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Cahya',
            'detail_kelas' => 'Canggih dan Berdaya'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Edi',
            'detail_kelas' => 'Ekonomi Digital'
        ]);
        Materi::create([
            'kelas_id' => 1,
            'judul_materi' => 'Materi 1'
        ]);
        Materi::create([
            'kelas_id' => 2,
            'judul_materi' => 'Materi 2'
        ]);
        Materi::create([
            'kelas_id' => 3,
            'judul_materi' => 'Materi 3'
        ]);
        
        Materi::create([
            'kelas_id' => 4,
            'judul_materi' => 'Materi 4'
        ]);
        
        Materi::create([
            'kelas_id' => 5,
            'judul_materi' => 'Materi 5'
        ]);
        Materi::create([
            'kelas_id' => 6,
            'judul_materi' => 'Materi 6'
        ]);
    }
}
