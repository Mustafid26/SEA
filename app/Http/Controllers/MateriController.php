<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function after($id)
    {
        $materi = Materi::find($id);
        return view('materi-after', [
            'active' => "kelas",
            'materi' => $materi
        ]);
    }
}
