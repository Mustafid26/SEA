<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Kelas;
use App\Models\PretestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PretestCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = Auth::id();
        $kelasId = $request->route('kelas_id');
        $pretestUserExists = PretestUser::where('user_id', $userId)
            ->where('kelas_id', $kelasId)
            ->exists();
        if (!$pretestUserExists) {
            // Redirect to the class page if the pretest user does not exist
            return redirect()->route('kelas');
        }
        return $next($request);
    }
}
