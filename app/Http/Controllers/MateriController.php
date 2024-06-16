<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\KontenMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function after($id)
    {
        $konten = KontenMateri::find($id); 
        $materi = Materi::find($id);
        return view('materi-after', [
            'active' => "kelas",
            'materi' => $materi,
            'konten' => $konten
        ]);
    }
    public function downloadFile($id)
    {
        $konten = KontenMateri::find($id); 
        $filename = $konten->konten;
        // Misalnya file disimpan di dalam direktori storage/app/public
        $file = storage_path("app/public/{$filename}");

        // Memeriksa apakah file ada
        if (!Storage::disk('public')->exists($filename)) {
            abort(404, 'File not found');
        }

        // Mengembalikan response untuk mengunduh file
        return response()->download($file);
    }
}
