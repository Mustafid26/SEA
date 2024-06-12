<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\PretestUser;

class PretestCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $materiId = $request->route('id');
        $userId = Auth::id();
        // Cek apakah pengguna sudah menyelesaikan pretest untuk materi tertentu
        $pretestCompleted = PretestUser::where('user_id', $userId)
            ->where('materi_id', $materiId)
            ->exists();
        if ($pretestCompleted) {
            return $next($request);
        }

        // Jika belum, redirect atau lakukan tindakan lain
        return redirect()->route('kelas');
    }
}
