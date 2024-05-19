<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kelas;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Kelas::create([
            'nama_kelas' => 'Bu Asih'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Cahya'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Peri'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Septi'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Ipah'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Edi'
        ]);
    }
}
