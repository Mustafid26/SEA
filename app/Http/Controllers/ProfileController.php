<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // Find the user with the given ID
       $user = User::find($id);

        return view('profile', [
            'user' => $user,
            'active' => 'Login'
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
    public function upload(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Simpan file ke storage/app/public/profile_photos
        $path = $request->file('profile_photo')->store('profile_photos', 'public');

        // Update user profile photo path
        $user->profile_photo_path = $path;
        $user->save();

        return back()->with('success', 'Profile photo updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $user = Auth::user();

        if ($user->profile_photo_path) {
            // Hapus file dari storage
            Storage::disk('public')->delete($user->profile_photo_path);

            // Update profile_photo_path menjadi null
            $user->profile_photo_path = null;
            $user->save();
        }

        return back()->with('success', 'Profile photo deleted successfully!');
    }
}