<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Question;
use App\Models\PretestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PretestController extends Controller
{
    public function show(Materi $materi)
    {
        $user = Auth::user();
        $pretestTaken = PretestUser::where('materi_id', $materi->id)
                                    ->where('user_id', $user->id)
                                    ->exists();

        if ($pretestTaken) {
            session()->flash('sweetalert', 'Kamu Sebelumnya Sudah Menyelesaikan Pretest.');
        }

        $questions = Question::where('materi_id', $materi->id)->get();
        return view('pretest', compact('questions', 'materi'));
    }   

    public function submit(Request $request, Materi $materi)
    {
        $user = Auth::user();
        $correctAnswers = 0;
        $totalQuestions = count($request->input('answers'));

        foreach ($request->input('answers') as $pretestId => $answer) {
            $pretest = Question::find($pretestId);
            if ($pretest->correct_option == $answer) {
                $correctAnswers++;
            }
        }

        $isPassed = $correctAnswers == $totalQuestions;

        PretestUser::create([
            'user_id' => $user->id,
            'materi_id' => $materi->id,
            'is_passed' => $isPassed
        ]);

        return redirect()->route('materi.show', $materi->id)->with('sweetalert', 'Pretest Anda Terkirim.');
    }
}
