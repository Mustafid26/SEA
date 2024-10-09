<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Kelas::create([
            'nama_kelas' => 'Bu Ipah',
            'detail_kelas' => 'Industri Sampah',
            'deskripsi' => 'Pelatihan Bu Ipah adalah sebuah pelatihan bagi perempuan tentang bagaimana cara mengolah sampah baik dan benar',
            'image' => 'photo_kelas/Bu Ipah.png'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Peri',
            'detail_kelas' => 'Perlindungan Diri',
            'deskripsi' => 'Pelatihan Bu Peri adalah sebuah pelatihan bagi perempuan tentang berbagai cara dalam perlindungan diri.',
            'image' => 'photo_kelas/Bu Ipah.png'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Asih',
            'detail_kelas' => 'Anak Sehat Ibu Hebat',
            'deskripsi' => 'Pelatihan Bu Asih adalah sebuah pelatihan bagi perempuan bagaimana cara mengurangi dampak Paparan Digital pada Anak dengan memaksimalkan permainan kreatif',
            'image' => 'photo_kelas/Bu Asih.png'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Septi',
            'detail_kelas' => 'Sehat Pangan Sarat Gizi',
            'deskripsi' => 'Pelatihan Bu Septi adalah sebuah pelatihan bagi perempuan untuk mengetahui bagaimana gaya hidup sehat dan nutrisi yang sehat',
            'image' => 'photo_kelas/Bu Septi.png'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Cahya',
            'detail_kelas' => 'Canggih dan Berdaya',
            'deskripsi' => 'Pelatihan Bu Cahya adalah sebuah pelatihan bagi perempuan tentang bagaimana foto produk yang bagus untuk memasarkan produk di pasar digital',
            'image' => 'photo_kelas/Bu Cahya.png'
        ]);
        Kelas::create([
            'nama_kelas' => 'Bu Edi',
            'detail_kelas' => 'Ekonomi Digital',
            'deskripsi' => 'Pelatihan Bu Edi adalah sebuah pelatihan bagi perempuan tentang teknik-teknik yang efektif untuk meningkatkan UMKM di e-commerce',
            'image' => 'photo_kelas/Bu Edi.png'
        ]);
        Materi::create([
            'kelas_id' => 1,
            'judul_materi' => 'Materi 1'
        ]);
        Question::create([
            'kelas_id' => 1,
            'question' => 'Apa yang harus dilakukan ketika terjadi ancaman Cyber Bullying?',
            'option1' => 'Lapor ke polisi',
            'option2' => 'Ajak berkelahi',
            'option3' => 'Lacak akun pelaku',
            'option4' => 'Report di aplikasi',
            'correct_answer' => 'Lapor ke polisi'
        ]);
    }
}
