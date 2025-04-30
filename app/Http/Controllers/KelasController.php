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
        $materi = $kelas->materi;
        $materi_id = Materi::where('kelas_id', $id)->get()->pluck('id');
        // dd($materi_id);
        $kontenId = KontenMateri::whereIn('materi_id', $materi_id)->pluck('id');
        $konten = KontenMateri::all();
        $kontenByMateri = $konten->groupBy('materi_id');
        // dd($konten);
        $takequestion = Question::whereIn('konten_materi_id', $kontenId)->get();
        // dd($takequestion);
        $takequestion_p = QuestionPostest::whereIn('konten_materi_id', $kontenId)->get();
        // dd($materi);
        $userId = auth()->id();
        $questions = $takequestion;
        $questions_postest = $takequestion_p;
        // dd($questions);
        if ($materi) {
            // $konten_materi = KontenMateri::where('materi_id', $materi_id)->get();
            $pdf = KontenMateri::whereIn('materi_id', $materi_id)
                ->whereNotNull('pdf_path')
                ->where('pdf_path', '!=', '')
                ->where('pdf_path', '!=', '-')
                ->get();
        } else {
            $pdf = collect(); 
        }

        $pretestCompleted = PretestUser::where('user_id', $userId)
            ->whereIn('materi_id', $materi_id)
            ->get()
            ->pluck('materi_id')
            ->toArray();
        $postestCompleted = PostestUser::where('user_id', $userId)
            ->whereIn('materi_id', $materi_id)
            ->get()
            ->pluck('materi_id')
            ->toArray();
        $sudahPresensi = Presensi::where('user_id', $userId)
            ->where('kelas_id', $kelas)
            ->exists();
        return view('materi', [
            'materi' => $materi,
            'materi_id' => $materi_id,
            'konten' => $konten,
            'kontenByMateri' => $kontenByMateri,
            'pdf' => $pdf,
            'kelas' => $kelas,
            'kelas_id' => $kelas->id,
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