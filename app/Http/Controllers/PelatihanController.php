<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Http\Requests\StorePelatihanRequest;
use App\Http\Requests\UpdatePelatihanRequest;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatihan= Pelatihan::orderBy('created_at', 'desc')->paginate(5);
        $jumlahpelatihan= Pelatihan::count();
        return view('pelatihan', [
            'pelatihan' => $pelatihan,
            'active' => 'pelatihan',
            'jumlahpelatihan' => $jumlahpelatihan
        ]);
    }
    public function show(Pelatihan $pelatihan)
    {
        return view('pelatihan-show', [
            'active' => 'pelatihan',
            'pelatihan' => $pelatihan
        ]);
    }
    public function authors(User $user)
    {
        return view('pelatihan',[
            'title' => 'User Posts',
            'active' => "post",
            'posts' => $user->pelatihan,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelatihanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePelatihanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelatihan $pelatihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelatihanRequest  $request
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelatihanRequest $request, Pelatihan $pelatihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelatihan $pelatihan)
    {
        //
    }
}