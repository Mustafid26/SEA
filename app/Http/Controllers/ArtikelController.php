<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::paginate(10);
        return view('artikel', [
            'artikel' => $artikel,
            'active' => 'artikel'
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
