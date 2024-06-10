<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\PretestUser;

class EnsurePretestNotTaken
{
    public function handle($request, Closure $next)
    {
        $materiId = $request->route('materi')->id;
        $userId = Auth::id();
        $pretestTaken = PretestUser::where('materi_id', $materiId)
                                    ->where('user_id', $userId)
                                    ->exists();

        if ($pretestTaken) {
            return redirect()->route('materi.show', $materiId)->with('message', 'You have already taken this pretest.');
        }

        return $next($request);
    }
}

