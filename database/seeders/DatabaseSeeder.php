<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Foto;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Artikel;
use App\Models\Question;
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
        // Materi::create([
        //     'kelas_id' => 2,
        //     'judul_materi' => 'Materi 2'
        // ]);
        // Materi::create([
        //     'kelas_id' => 3,
        //     'judul_materi' => 'Materi 3'
        // ]);
        
        // Materi::create([
        //     'kelas_id' => 4,
        //     'judul_materi' => 'Materi 4'
        // ]);
        
        // Materi::create([
        //     'kelas_id' => 5,
        //     'judul_materi' => 'Materi 5'
        // ]);
        // Materi::create([
        //     'kelas_id' => 6,
        //     'judul_materi' => 'Materi 6'
        // ]);
        // Artikel::factory(20)->create();
        Question::create([
            'kelas_id' => 1,
            'question' => 'Apa yang harus dilakukan ketika terjadi ancaman Cyber Bullying?',
            'option1' => 'Lapor ke polisi',
            'option2' => 'Ajak berkelahi',
            'option3' => 'Lacak akun pelaku',
            'option4' => 'Report di aplikasi',
            'correct_answer' => 'Lapor ke polisi'
        ]);
        Foto::create([
            'id' => 1,
            'title' => 'RW 34',
            'desc' => 'Foto diatas merupakan sosialisasi SEKARI di RW 34',
            'image' => 'foto_beranda/RW34.png'
        ]);
        Foto::create([
            'id' => 2,
            'title' => 'RW 23',
            'desc' => 'Foto diatas merupakan sosialisasi SEKARI di RW 23',
            'image' => 'foto_beranda/RW23.png'
        ]);
        Foto::create([
            'id' => 3,
            'title' => 'RW 32',
            'desc' => 'Foto diatas merupakan sosialisasi SEKARI di RW 32',
            'image' => 'foto_beranda/RW32.png'
        ]);
        Foto::create([
            'id' => 4,
            'title' => 'RW 36',
            'desc' => 'Foto diatas merupakan sosialisasi SEKARI di RW 36',
            'image' => 'foto_beranda/RW36.png'
        ]);
        Foto::create([
            'id' => 5,
            'title' => 'RW 40',
            'desc' => 'Foto diatas merupakan sosialisasi SEKARI di RW 40',
            'image' => 'foto_beranda/RW40.png'
        ]);
    }
}