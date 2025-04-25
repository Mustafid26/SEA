<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Answer;
use App\Models\Materi;
use App\Models\Question;
use App\Models\PretestUser;
use Illuminate\Support\Arr;
use App\Models\KontenMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PretestController extends Controller
{
    public function show(KontenMateri $konten)
    {
        $user = Auth::user();
        $materi_id = Materi::pluck('id')->first(); 
        $konten = KontenMateri::where('materi_id', $materi_id)->value('id');

        // dd($materi_id);
        $correctAnswers = 0;
        $pretestTaken = PretestUser::where('materi_id',  $konten)
            ->where('user_id', $user->id)
            ->exists();

        if ($pretestTaken) {
            session()->flash('sweetalert', 'Kamu Sebelumnya Sudah Menyelesaikan Pretest.');
        }

        $questions = Question::where('konten_materi_id',  $konten)->get();
        // dd($questions);
        return view('pretest', compact('questions', 'materi_id'));
    }

    public function submit(Request $request, Materi $materi)
    {
        $user = Auth::user();
        $correctAnswers = 0;
        $materi_id = Materi::pluck('id')->first(); // Ambil satu id pertama


        $questionIds = $request->input('questions', []);
        $totalQuestions = count($questionIds);

        $answers = Arr::wrap($request->input('answers', []));

        foreach ($answers as $questionId => $answer) {
            $question = Question::find($questionId);
            if ($question) {
                Answer::create([
                    'user_id' => $user->id,
                    'question_id' => $questionId,
                    'materi_id' => $materi_id,
                    'answer' => $answer,
                    'is_correct' => $question->correct_answer == $answer,
                ]);

                if ($question->correct_answer == $answer) {
                    $correctAnswers++;
                }
            }
        }

        if ($totalQuestions > 0) {
            $score = ($correctAnswers / $totalQuestions) * 100;
        } else {
            $score = 0;
        }
        PretestUser::create([
            'user_id' => $user->id,
            'materi_id' => $materi_id,
            'score' => $score
        ]);

        return redirect()->route('materi.show', $materi->id)->with([
            'sweetalert' => 'Pretest Anda Terkirim. Nilai Anda : ' . $score,
            'score' => $score
        ]);
    }
}
