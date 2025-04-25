<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Submit;
use App\Models\Presensi;
use App\Models\Question;
use App\Models\Penilaian;
use App\Models\PostestUser;
use App\Models\PretestUser;
use App\Models\KontenMateri;
use Illuminate\Http\Request;
use App\Models\QuestionPostest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRombel = auth()->user()->rombel_id;
        $kelas = Kelas::where('rombel_id', $userRombel)->paginate(10);
        if ($userRombel === 'Sekari 03') {
            $penilaian = Penilaian::where('rombel', $userRombel)->paginate(10);
        } else {
            $penilaian = collect();
        }
        return view('kelas', [
            'active' => "kelas",
            'penilaian' => $penilaian,
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
        // $materi = $kelas->materi;
        $materi = $kelas->materi;
        $materi_id = Materi::where('kelas_id', $id)->value('id');
        $konten = KontenMateri::where('materi_id', $materi_id)->value('id');
        // dd($konten);
        $takequestion = Question::where('konten_materi_id', $konten)->get();
        // dd($takequestion);
        $takequestion_p = QuestionPostest::where('konten_materi_id', $konten)->get();
        // dd($materi);
        $userId = auth()->id();
        $questions = $takequestion;
        $questions_postest = $takequestion_p;
        // dd($questions);
        if ($materi) {
            $pdf = KontenMateri::where('materi_id', $materi_id)->get();
            // dd($pdf);
        } else {
            $pdf = null;
        }
        $pretestCompleted = PretestUser::where('user_id', $userId)
            ->where('materi_id', $materi_id)
            ->exists();
        $postestCompleted = PostestUser::where('user_id', $userId)
            ->where('materi_id',  $materi_id)
            ->exists();
        $sudahPresensi = Presensi::where('user_id', $userId)
            ->where('kelas_id', $materi_id)
            ->exists();
        return view('materi', [
            'materi' => $materi,
            'materi_id' => $materi_id,
            'pdf' => $pdf,
            'kelas' => $kelas,
            'active' => "kelas",
            'pretestCompleted' => $pretestCompleted,
            'postestCompleted' => $postestCompleted,
            'questions' => $questions,
            'questions_postest' => $questions_postest,
            'sudahPresensi' => $sudahPresensi
        ]);
    }

    public function showFormPenilaian($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        return view('formpenilaian', [
            'penilaian' => $penilaian,
            'active' => 'kelas',
        ]);
    }
    public function submitFormPenilaian(Request $request)
    {
        $existingSubmit = Submit::where('user_id', auth()->user()->id)->first();

        if ($existingSubmit) {
            // Jika sudah pernah mengirimkan, arahkan kembali dengan pesan
            return redirect()->back()->with('error', 'Anda sudah mengirimkan penilaian.');
        }

        $data = new Submit;
        $data->user_id = auth()->user()->id;
        $data->body = $request->body;
        $data->save();
        return redirect()->route('kelas')->with(['sweetalert' => 'Penilaian Anda Berhasil Disimpan!']);
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
