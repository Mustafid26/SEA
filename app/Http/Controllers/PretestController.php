<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Answer;
use App\Models\Question;
use App\Models\PretestUser;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PretestController extends Controller
{
    public function show(Kelas $kelas)
    {
        $user = Auth::user();
        $correctAnswers = 0;
        $pretestTaken = PretestUser::where('kelas_id', $kelas->id)
                                    ->where('user_id', $user->id)
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

        $questionIds = $request->input('questions', []);
        $totalQuestions = count($questionIds);

        $answers = Arr::wrap($request->input('answers', []));

        foreach ($answers as $questionId => $answer) {
            $question = Question::find($questionId);
            if ($question) {
                Answer::create([
                    'user_id' => $user->id,
                    'question_id' => $questionId,
                    'kelas_id' => $kelasId,
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
            'kelas_id' => $kelasId,
            'score' => $score
        ]);

        return redirect()->route('materi.show', $kelas->id)->with([
            'sweetalert' => 'Pretest Anda Terkirim. Nilai Anda : ' . $score,
            'score' => $score
        ]);
    }
}
