<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Question;
use App\Models\PretestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PretestController extends Controller
{
    public function show(Kelas $kelas)
    {
        $user = Auth::user();
        $pretestTaken = PretestUser::where('kelas_id', $kelas->id)
                                    ->where('user_id', $user->id)
                                    ->where('is_passed', true)
                                    ->exists();

        if ($pretestTaken) {
            session()->flash('sweetalert', 'Kamu Sebelumnya Sudah Menyelesaikan Pretest.');
        }

        $questions = Question::where('kelas_id', $kelas->id)->get();
        return view('pretest', compact('questions', 'kelas'));
    }   

    public function submit(Request $request, Kelas $kelas)
    {
        $user = Auth::user();
        $correctAnswers = 0;
        $kelasId = $kelas->id;
        $totalQuestions = count($request->input('answers'));

        foreach ($request->input('answers') as $pretestId => $answer) {
            $pretest = Question::find($pretestId);
            if ($pretest->correct_option == $answer) {
                $correctAnswers++;
            }
        }
        $isPassed = true;

        PretestUser::create([
            'user_id' => $user->id,
            'kelas_id' => $kelasId,
            'is_passed' => $isPassed
        ]);

        return redirect()->route('materi.show', $kelas->id)->with('sweetalert', 'Pretest Anda Terkirim.');
    }
}
