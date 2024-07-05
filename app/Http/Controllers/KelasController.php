<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\PretestUser;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas', [
            'active' => "kelas",
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        $materi = $kelas->materi;
        $userId = auth()->id();
        $questions = $kelas->questions; 
        $questions_postest = $kelas->questions_postest;
        $pretestCompleted = PretestUser::where('user_id', $userId)
                                       ->where('kelas_id', $kelas->id)
                                       ->exists();
        return view('materi', [
            'materi' => $materi,
            'kelas' => $kelas,
            'active' => "kelas",
            'pretestCompleted' => $pretestCompleted,
            'questions' => $questions,
            'questions_postest' => $questions_postest
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
