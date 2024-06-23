<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PostestUser;
use Illuminate\Http\Request;
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
        $totalQuestions = count($request->input('answers'));

        foreach ($request->input('answers') as $questionId => $answer) {
            $questions_postest = QuestionPostest::find($questionId);
            if ($questions_postest) {
                if ($questions_postest->correct_answer == $answer) {
                    $correctAnswers++;
                }
            }
        }
        $score = ($correctAnswers / $totalQuestions) * 100;
        PostestUser::create([
            'user_id' => $user->id,
            'kelas_id' => $kelasId,
            'score' => $score
        ]);

        return redirect()->route('materi.show', $kelas->id)->with([
            'sweetalert' => 'Postest Anda Terkirim. Nilai Anda : ' . $score,
            'score' => $score
        ]);

    }
}
