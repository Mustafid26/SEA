<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('artikel', [
            'title' => 'Artikel',
            'active' => 'artikel',
        ]);
    }
    public function show(Artikel $artikel)
    {
        return view('artikel-show', [
            'active' => 'pusat_informasi',
            'artikel' => $artikel
        ]);
    }
    public function authors(User $user)
    {
        return view('artikel', [
            'title' => 'User Posts',
            'active' => "post",
            'posts' => $user->artikel,
        ]);
    }
}