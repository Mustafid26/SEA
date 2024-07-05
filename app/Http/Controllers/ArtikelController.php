<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::orderBy('created_at', 'desc')->paginate(10);
        $jumlahartikel = Artikel::count();
        return view('artikel', [
            'artikel' => $artikel,
            'active' => 'artikel',
            'jumlahartikel' => $jumlahartikel
        ]);
    }
    public function show(Artikel $artikel)
    {
        return view('artikel-show', [
            'active' => 'artikel',
            'artikel' => $artikel
        ]);
    }
    public function authors(User $user)
    {
        return view('artikel',[
            'title' => 'User Posts',
            'active' => "post",
            'posts' => $user->artikel,
        ]);
    }
}