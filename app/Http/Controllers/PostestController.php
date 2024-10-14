<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PostestUser;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\AnswerPostest;
use App\Models\QuestionPostest;
use Illuminate\Support\Facades\Auth;

class PostestController extends Controller
{
    public function show(Kelas $kelas)
    {
        $user = Auth::user();
        $correctAnswers = 0;
        $postestTaken = PostestUser::where('kelas_id', $kelas->id)
                                    ->where('user_id', $user->id)
                                    ->exists();

        // if ($pretestTaken) {
        //     session()->flash('sweetalert', 'Kamu Sebelumnya Sudah Menyelesaikan Postest.');
        // }

        $questions_postest = QuestionPostest::where('kelas_id', $kelas->id)->get();
        return view('postest', compact('questions_postest', 'kelas'));
    }   

    public function submit(Request $request, Kelas $kelas)
    {
        $user = Auth::user();
        $correctAnswers = 0;
        $kelasId = $kelas->id;

        $questionIds = $request->input('questions', []);
        $totalQuestions = count($questionIds);


        $answers = Arr::wrap($request->input('answers', []));


        foreach ($request->input('answers') as $questionId => $answer) {
            $questions_postest = QuestionPostest::find($questionId);
            if ($questions_postest) {
                $isCorrect = $questions_postest->correct_answer == $answer;
                if ($isCorrect) {
                    $correctAnswers++;
                }
    
                // Simpan jawaban ke dalam tabel answers_postest
                AnswerPostest::create([
                    'user_id' => $user->id,
                    'question_id' => $questionId,
                    'kelas_id' => $kelasId,
                    'answer' => $answer,
                    'is_correct' => $isCorrect,
                ]);
            }
        }
        if ($totalQuestions > 0) {
            $score = ($correctAnswers / $totalQuestions) * 100;
        } else {
            $score = 0;
        }
        // $points = $this->calculatePoints($score);
        // $user->points += $points;
        $user->save();
        PostestUser::create([
            'user_id' => $user->id,
            'kelas_id' => $kelasId,
            'score' => $score
        ]);

        return redirect()->route('materi.show', $kelas->id)->with([
            'sweetalert' => 'Postest Anda Terkirim. Nilai Anda : ' . $score,
            'score' => $score,
            // 'points' => $points
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
