<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artikel;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('layouts.main' , [
            'active' => 'Login'
        ]);
    }
    
    public function redirect()
    {
        $usertype = Auth::user() -> usertype;
        if ($usertype == '1'){
            $total_artikel=artikel::all()->count();
            $total_kelas=kelas::all()->count();
            $total_user=user::all()->count();
            return view('admin.home', compact('total_artikel', 'total_kelas', 'total_user'));
        } else {
            
            return view('layouts.main' , [
                'active' => 'Login'
            ]) ;
        }
    }

    public function comingsoon()
    {
        if (auth::id()) {
            return view('comingsoon'); 
        } 
        else {
            return redirect('login');
        }
        
    }
    
}