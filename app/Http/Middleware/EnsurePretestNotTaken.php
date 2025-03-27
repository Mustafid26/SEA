<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Materi;
use App\Models\PretestUser;

class EnsurePretestNotTaken
{
    public function handle($request, Closure $next)
    {
        $materi_id = Materi::where('kelas_id', $request)->value('id');
        $userId = Auth::id();
    
        $pretestTaken = PretestUser::where('materi_id', $materi_id)
                                   ->where('user_id', $userId)
                                   ->exists();

        if ($pretestTaken) {
            return redirect()->route('kelas', $materi_id)->with('sweetalert', 'Anda sudah mengambil pretest untuk kelas ini.');
        }
        return $next($request);
    }
}
