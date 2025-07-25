<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Submit;
use App\Models\Survey;
use App\Models\Presensi;
use App\Models\Question;
use App\Models\Penilaian;
use App\Models\PostestUser;
use App\Models\PretestUser;
use App\Models\KontenMateri;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\QuestionPostest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Cache;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->role !== 'sekari') {
            abort(Response::HTTP_UNAUTHORIZED, 'Anda tidak memiliki akses untuk melihat halaman ini.');
        }

        $userRombelId = $user->rombel_id;

        // 1. Definisikan KUNCI VERSI dan dapatkan versi terbaru dari cache
        $versionKey = 'kelas_version_rombel_' . $userRombelId;
        $version = Cache::get($versionKey, 1); // Ambil versi saat ini, jika tidak ada, default ke 1

        // 2. Buat KUNCI DATA yang unik dengan menyertakan nomor versi
        $currentPage = request()->get('page', 1);
        $dataKey = "kelas_rombel_{$userRombelId}_v{$version}_page_{$currentPage}";

        // 3. Gunakan kunci data yang sudah bervesi untuk menyimpan atau mengambil data
        $kelas = Cache::remember($dataKey, now()->addMinutes(60), function () use ($userRombelId) {
            return Kelas::where('rombel_id', $userRombelId)
                ->select('id','nama_kelas', 'detail_kelas', 'image')
                ->paginate(10);
        });

        return view('kelas', [
            'active' => "kelas",
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


    public function add_presensi(Request $request)
    {
        $presensi = new Presensi;
        $presensi->kehadiran = $request->kehadiran;
        $presensi->user_id = auth()->user()->id;
        $presensi->materi_id = $request->materi_id;
        $presensi->save();
        Alert::success('Success', 'Presensi Telah Berhasil');
        return redirect()->back();
    }

    public function add_survey(Request $request)
    {
        // dd($request->all());
        $survey = new Survey;
        $survey->survey = $request->survey;
        $survey->saran = $request->saran;
        $survey->user_id = auth()->user()->id;
        $survey->materi_id = $request->materi_id;
        $survey->save();
        Alert::success('Success', 'Survey Telah Berhasil Disimpan');
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show($kelas_id)
    {
        $kelas = Kelas::findOrFail($kelas_id);
        $userId = auth()->id();

        // Ambil semua materi terkait kelas
        $materi = $kelas->materi;
        $materiIds = $materi->pluck('id');

        // Ambil semua konten materi dari materi terkait
        $kontenMateri = KontenMateri::whereIn('materi_id', $materiIds)->get();
        $kontenByMateri = $kontenMateri->groupBy('materi_id');
        $kontenIds = $kontenMateri->pluck('id');


        $kontenWithQuestions = Question::whereIn('konten_materi_id', $kontenIds)
            ->pluck('konten_materi_id')
            ->toArray();
        $kontenMateriMap = KontenMateri::whereIn('id', $kontenWithQuestions)->get()
            ->pluck('materi_id')
            ->unique()
            ->toArray();

        $kontenWithQuestionsPos = Question::whereIn('konten_materi_id', $kontenIds)
            ->pluck('konten_materi_id')
            ->toArray();
        $kontenMateriPosMap = KontenMateri::whereIn('id', $kontenWithQuestionsPos)->get()
            ->pluck('materi_id')
            ->unique()
            ->toArray();

        // Ambil PDF valid jika ada
        $pdfs = KontenMateri::whereIn('materi_id', $materiIds)
            ->whereNotNull('pdf_path')
            ->whereNotIn('pdf_path', ['', '-'])
            ->get();

        // Cek user sudah menyelesaikan pretest/postest
        $pretestCompleted = PretestUser::where('user_id', $userId)
            ->whereIn('materi_id', $materiIds)
            ->pluck('materi_id')
            ->toArray();

        $postestCompleted = PostestUser::where('user_id', $userId)
            ->whereIn('materi_id', $materiIds)
            ->pluck('materi_id')
            ->toArray();

        $presensiByMateri = Presensi::where('user_id', $userId)
            ->whereIn('materi_id', $materiIds)
            ->pluck('materi_id')
            ->toArray();

        $surveyCompleted = Survey::where('user_id', $userId)
            ->whereIn('materi_id', $materiIds)
            ->pluck('materi_id')
            ->toArray();


        return view('materi', [
            'kelas' => $kelas,
            'kelas_id' => $kelas->id,
            'materi' => $materi,
            'materi_id' => $materiIds,
            'konten' => $kontenMateri,
            'kontenByMateri' => $kontenByMateri,
            'pdf' => $pdfs,
            'kontenMateriWithQuestions' => $kontenMateriMap,
            'kontenMateriWithQuestionsPos' => $kontenMateriPosMap,
            'pretestCompleted' => $pretestCompleted,
            'postestCompleted' => $postestCompleted,
            'surveyCompleted' => $surveyCompleted,
            'presensiByMateri' => $presensiByMateri,
            'active' => 'kelas',
        ]);
    }


    // public function showFormPenilaian($id)
    // {
    //     $penilaian = Penilaian::findOrFail($id);
    //     return view('formpenilaian', [
    //         'penilaian' => $penilaian,
    //         'active' => 'kelas',
    //     ]);
    // }
    // public function submitFormPenilaian(Request $request)
    // {
    //     $existingSubmit = Submit::where('user_id', auth()->user()->id)->first();

    //     if ($existingSubmit) {
    //         // Jika sudah pernah mengirimkan, arahkan kembali dengan pesan
    //         return redirect()->back()->with('error', 'Anda sudah mengirimkan penilaian.');
    //     }

    //     $data = new Submit;
    //     $data->user_id = auth()->user()->id;
    //     $data->body = $request->body;
    //     $data->save();
    //     return redirect()->route('kelas')->with(['sweetalert' => 'Penilaian Anda Berhasil Disimpan!']);
    // }
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