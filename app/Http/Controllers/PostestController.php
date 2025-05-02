<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Question;
use App\Models\PostestUser;
use App\Models\PretestUser;
use Illuminate\Support\Arr;
use App\Models\KontenMateri;
use Illuminate\Http\Request;
use App\Models\AnswerPostest;
use App\Models\QuestionPostest;
use Illuminate\Support\Facades\Auth;

class PostestController extends Controller
{
    public function show($kelas_id, $materi_id)
    {
        $user = Auth::user();
        $correctAnswers = 0;
        $konten = KontenMateri::where('materi_id', $materi_id)->firstOrFail();

        $postestTaken = PostestUser::where('materi_id', $materi_id)
            ->where('user_id', $user->id)
            ->exists();

        if ($postestTaken) {
            session()->flash('sweetalert', 'Kamu Sebelumnya Sudah Menyelesaikan Posttest.');
        }

        $questions_postest = QuestionPostest::where('konten_materi_id', $konten->id)->get();

        return view('postest', compact('questions_postest', 'materi_id', 'kelas_id'));
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
            $question = QuestionPostest::find($questionId);
            if ($question) {
                AnswerPostest::create([
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

        PostestUser::create([
            'user_id' => $user->id,
            'materi_id' => $materi_id,
            'score' => $score
        ]);

        return redirect()->route('materi.show', $kelas_id)->with([
            'sweetalert' => 'Pretest Anda Terkirim. Nilai Anda : ' . $score,
            'score' => $score
        ]);
    }


    // private function calculatePoints($score)
    // {
    //     if ($score >= 95) {
    //         return 100;
    //     } elseif ($score >= 85) {
    //         return 90;
    //     } elseif ($score >= 75) {
    //         return 80;
    //     } elseif ($score >= 65) {
    //         return 70;
    //     } elseif ($score >= 55) {
    //         return 60;
    //     } else {
    //         return 50;
    //     }
    // }
}