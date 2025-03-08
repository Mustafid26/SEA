<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pelatihan;


class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihan= Pelatihan::orderBy('created_at', 'desc')->paginate(5);
        $jumlahpelatihan= Pelatihan::count();
        return view('pelatihan', [
            'pelatihan' => $pelatihan,
            'active' => 'pusat_informasi',
            'jumlahpelatihan' => $jumlahpelatihan
        ]);
    }
    public function show(Pelatihan $pelatihan)
    {
        return view('pelatihan-show', [
            'active' => 'pusat_informasi',
            'pelatihan' => $pelatihan
        ]);
    }
    public function authors(Admin $user)
    {
        return view('pelatihan',[
            'title' => 'User Posts',
            'active' => "post",
            'posts' => $user->pelatihan,
        ]);
    }
   
}