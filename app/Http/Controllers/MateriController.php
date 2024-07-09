<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\KontenMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function after($id, $kelas_id)
    {
        $konten = KontenMateri::where('materi_id', $id)->first();
        $materi = Materi::find($id);
        if ($materi) {
            $kelas = $materi->kelas;
        } elseif ($konten) {
            $kelas = $konten->kelas;
        } else {
            abort(404, 'Materi atau KontenMateri tidak ditemukan');
        }
    
        return view('materi-after', [
            'active' => "kelas",
            'materi' => $materi,
            'konten' => $konten,
            'kelas' => $kelas
        ]);
    }
    public function downloadFile($id)
    {
        $konten = KontenMateri::find($id);
        $filename = $konten->konten;
        // Misalnya file disimpan di dalam direktori storage/app/public
        $filePath = "public/powerpoint_files/{$filename}";
        // Memeriksa apakah file ada
        if (!Storage::exists($filePath)) {
            abort(404, 'File not found');
        }

        // Mengembalikan response untuk mengunduh file
        return Storage::download($filePath);
    }
    public function view($id)
    {
        $konten = KontenMateri::find($id); 
        // dd($konten);
        return view('view_materi', compact('konten'));
    }
}