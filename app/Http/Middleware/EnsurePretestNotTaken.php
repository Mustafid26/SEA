<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\PretestUser;

class EnsurePretestNotTaken
{
    public function handle($request, Closure $next)
    {
        $kelasId = $request->route('kelas')->id;
        $userId = Auth::id();
    
        $pretestTaken = PretestUser::where('kelas_id', $kelasId)
                                   ->where('user_id', $userId)
                                   ->exists();

        if ($pretestTaken) {
            return redirect()->route('kelas', $kelasId)->with('sweetalert', 'Anda sudah mengambil pretest untuk kelas ini.');
        }
        return $next($request);
    }
}
