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
    public function show($kelas_id, $materi_id)
    {
        $user = Auth::user();

        $konten = KontenMateri::where('materi_id', $materi_id)->firstOrFail();

        $pretestTaken = PretestUser::where('materi_id', $materi_id)
            ->where('user_id', $user->id)
            ->exists();

        if ($pretestTaken) {
            session()->flash('sweetalert', 'Kamu Sebelumnya Sudah Menyelesaikan Pretest.');
        }

        $questions = Question::where('konten_materi_id', $konten->id)->get();

        return view('pretest', compact('questions', 'materi_id', 'kelas_id'));
    }


    public function submit(Request $request, $kelas_id, $materi_id)
    {
        $user = Auth::user();

        $konten = KontenMateri::where('materi_id', $materi_id)->firstOrFail();

        $questionIds = $request->input('questions', []);
        $totalQuestions = count($questionIds);

        $answers = Arr::wrap($request->input('answers', []));
        $correctAnswers = 0;

        foreach ($answers as $questionId => $answer) {
            $question = Question::find($questionId);
            if ($question) {
                Answer::create([
                    'user_id' => $user->id,
                    'kelas_id' => $kelas_id,
                    'materi_id' => $materi_id,
                    'question_id' => $questionId,
                    'answer' => $answer,
                    'is_correct' => $question->correct_answer == $answer,
                ]);

                if ($question->correct_answer == $answer) {
                    $correctAnswers++;
                }
            }
        }

        $score = $totalQuestions > 0 ? ($correctAnswers / $totalQuestions) * 100 : 0;

        PretestUser::create([
            'user_id' => $user->id,
            'materi_id' => $materi_id,
            'score' => $score
        ]);

        return redirect()->route('materi.show', $kelas_id)->with([
            'sweetalert' => 'Pretest Anda Terkirim. Nilai Anda : ' . $score,
            'score' => $score
        ]);
    }


}