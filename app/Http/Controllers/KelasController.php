<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\PretestUser;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
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

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        $materi = $kelas->materi;
        $userId = auth()->id();
        $questions = $kelas->questions; 
        $pretestCompleted = PretestUser::where('user_id', $userId)
                                       ->where('kelas_id', $kelas->id)
                                       ->exists();
        return view('materi', [
            'materi' => $materi,
            'kelas' => $kelas,
            'active' => "kelas",
            'pretestCompleted' => $pretestCompleted,
            'questions' => $questions
        ]);
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
    // public function getContent($kelas)
    // {
    //     $content = '';
    //     $sidebar = '';

    //     switch ($kelas) {
    //         case 'Bu Asih':
    //             $content = '<div id="content" class="p-3 bg-white border rounded shadow-lg">
    //                             <p>Pratinjau Kelas Bu Asih</p>
    //                         </div>';
    //             $sidebar = '
    //             <div id="sidebar" class="d-flex flex-column shadow-lg">
    //                 <div class="header">
    //                     <h4>Materi Belajar</h4>
    //                 </div>
    //                 <ul class="nav nav-pills flex-column mb-auto" id="materiList">
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link active" aria-current="page" onclick="showPreview(event, \'Bu Asih\', \'Materi 1 Bu Asih\')">Materi 1 Bu Asih</a>
    //                     </li>
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link" onclick="showPreview(event, \'Bu Asih\', \'Materi 2 Bu Asih\')">Materi 2 Bu Asih</a>
    //                     </li>
    //                 </ul>
    //             </div>';
    //             break;
    //         case 'Bu Cahya':    
    //             $content = '<div id="content" class="p-3 bg-white border rounded shadow-lg">
    //                             <p>Pratinjau Kelas Bu Cahya</p>
    //                         </div>';
    //             $sidebar = '
    //             <div id="sidebar" class="d-flex flex-column shadow-lg">
    //                 <div class="header">
    //                     <h4>Materi Belajar</h4>
    //                 </div>
    //                 <ul class="nav nav-pills flex-column mb-auto" id="materiList">
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link active" aria-current="page" onclick="showPreview(event, \'Materi 1 Bu Cahya\')">Materi 1 Bu Cahya</a>
    //                     </li>
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link" onclick="showPreview(event, \'Materi 2 Bu Cahya\')">Materi 2 Bu Cahya</a>
    //                     </li>
    //                 </ul>
    //             </div>';
    //             break;
    //         case 'Bu Peri':
    //             $content = '<div id="content" class="p-3 bg-white border rounded shadow-lg">
    //                             <p>Pratinjau Kelas Bu Peri</p>
    //                         </div>';
    //             $sidebar = '
    //             <div id="sidebar" class="d-flex flex-column shadow-lg">
    //                 <div class="header">
    //                     <h4>Materi Belajar</h4>
    //                 </div>
    //                 <ul class="nav nav-pills flex-column mb-auto" id="materiList">
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link active" aria-current="page" onclick="showPreview(event, \'Materi 1 Bu Peri\')">Materi 1 Bu Peri</a>
    //                     </li>
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link" onclick="showPreview(event, \'Materi 2 Bu Peri\')">Materi 2 Bu Peri</a>
    //                     </li>
    //                 </ul>
    //             </div>';
    //             break;
    //         case 'Bu Septi':
    //             $content = '<div id="content" class="p-3 bg-white border rounded shadow-lg">
    //                             <p>Pratinjau Kelas Bu Septi</p>
    //                         </div>';
    //             $sidebar = '
    //             <div id="sidebar" class="d-flex flex-column shadow-lg">
    //                 <div class="header">
    //                     <h4>Materi Belajar</h4>
    //                 </div>
    //                 <ul class="nav nav-pills flex-column mb-auto" id="materiList">
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link active" aria-current="page" onclick="showPreview(event, \'Materi 1 Bu Septi\')">Materi 1 Bu Septi</a>
    //                     </li>
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link" onclick="showPreview(event, \'Materi 2 Bu Septi\')">Materi 2 Bu Septi</a>
    //                     </li>
    //                 </ul>
    //             </div>';
    //             break;
    //         case 'Bu Ipah':
    //             $content = '<div id="content" class="p-3 bg-white border rounded shadow-lg">
    //                             <p>Pratinjau Kelas Bu Ipah</p>
    //                         </div>';
    //             $sidebar = '
    //             <div id="sidebar" class="d-flex flex-column shadow-lg">
    //                 <div class="header">
    //                     <h4>Materi Belajar</h4>
    //                 </div>
    //                 <ul class="nav nav-pills flex-column mb-auto" id="materiList">
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link active" aria-current="page" onclick="showPreview(event, \'Materi 1 Bu Ipah\')">Materi 1 Bu Ipah</a>
    //                     </li>
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link" onclick="showPreview(event, \'Materi 2 Bu Ipah\')">Materi 2 Bu Ipah</a>
    //                     </li>
    //                 </ul>
    //             </div>';
    //             break;
    //         case 'Bu Edi':
    //             $content = '<div id="content" class="p-3 bg-white border rounded shadow-lg">
    //                             <p>Pratinjau Kelas Bu Edi</p>
    //                         </div>';
    //             $sidebar = '
    //             <div id="sidebar" class="d-flex flex-column shadow-lg">
    //                 <div class="header">
    //                     <h4>Materi Belajar</h4>
    //                 </div>
    //                 <ul class="nav nav-pills flex-column mb-auto" id="materiList">
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link active" aria-current="page" onclick="showPreview(event, \'Materi 1 Bu Edi\')">Materi 1 Bu Edi</a>
    //                     </li>
    //                     <li class="nav-item">
    //                         <a href="#" class="nav-link" onclick="showPreview(event, \'Materi 2 Bu Edi\')">Materi 2 Bu Edi</a>
    //                     </li>
    //                 </ul>
    //             </div>';
    //             break;
    //         default:
    //             $content = '<p>Pilih kelas untuk melihat materi.</p>';
    //             $sidebar = '<h2>Pilih Kelas</h2>
    //                         <ul class="nav nav-pills flex-column mb-auto">
    //                             <li class="nav-item">
    //                                 <a href="#" class="nav-link active" aria-current="page">Pilih kelas untuk melihat materi.</a>
    //                             </li>
    //                         </ul>';
    //     }

    //     return response()->json(['content' => $content, 'sidebar' => $sidebar]);
    // }
    
}
