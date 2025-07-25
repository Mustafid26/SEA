<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artikel;
use App\Models\Kelas;
use App\Models\Foto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{

    public function index()
    {
        $photos = Cache::remember('photos', 600, function () {
            return Foto::select('title', 'image')
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get();
        });

        // Gabungkan semua variabel ke dalam satu array
        return view('home', [
            'photos' => $photos,
            'active' => 'beranda'
        ]);
    }

    public function comingsoon()
    {
        return view('comingsoon2');
    }

    public function konseling()
    {
        return view('konseling', [
            'active' => 'konseling'
        ]);
    }

    public function popupmateri()
    {
        return view('popupmateri');
    }
}