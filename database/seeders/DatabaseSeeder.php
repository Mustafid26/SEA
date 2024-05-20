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
            'nama_kelas' => 'Bu Ipah'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Peri'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Asih'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Septi'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Cahya'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Edi'
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
