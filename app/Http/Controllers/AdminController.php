<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artikel;
use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function view_user()
    {
        if (auth::id()) {
            $user=User::all();
            return view('admin.user', compact('user')); 
        } 
        else {
            return redirect('login');
        }
        
    }

    public function add_user (Request $request)
    {
        $data= new User;
        $data-> name=$request->name;
        $data-> nik=$request->nik;
        $data-> password=bcrypt($request->password);
        $data-> role=$request->role;
        if($request->role=='admin')
        {
            $data -> usertype = $request-> usertype = 1;
        }
        else
        {
            $data -> usertype = $request-> usertype = 0;
        }
       
        $data->save();
        Alert::success('Success', 'User added successfully');
        return redirect()->back();
    }
    
    public function show_user()
    {
       if (auth::id()){
            $user=User::all();   
            return view('admin.show_user', compact('user'));
        }
        else{
            return redirect('login');
        }
    }
    public function update_user($id)
    {
        $data=User::find($id);
        return view('admin.update_user', compact('data'));
        
    }
    public function delete_user($id)
    {
        $data=User::find($id);
        $data->delete();
        Alert::success('Success', 'User deleted successfully');
        return redirect()->back();
    }
    public function update_user_2(Request $request,$id)
    {
        $data=User::find($id);
        $data-> name=$request->nama;
        $data-> nik=$request->nik;
        $data-> role=$request->role;
        if($request->role=='admin')
        {
            $data -> usertype = $request-> usertype = 1;
        }
        else
        {
            $data -> usertype = $request-> usertype = 0;
        }
        
        $data->save();
        Alert::success('Success', 'User Updated successfully');
        return redirect()->back();
    }

    public function search_user(Request $request)
    {
        $search_text = $request->search_user;
        $user = user::where('name', 'LIKE', "%$search_text%")->GET();
        return view('admin.show_user', compact('user'));
    }

    //artikel
    
    public function view_artikel()
    {
        if (auth::id()) {
            $artikel=Artikel::all();
            return view('admin.artikel', compact('artikel')); 
        } 
        else {
            return redirect('login');
        }
        
    }

    public function add_artikel (Request $request)
    {
        $artikel= new Artikel;
        $artikel-> title=$request->title;
        $artikel-> slug=$request->slug;
        $artikel-> body=$request->body;
        $artikel ->user_id = auth()->user()->id;

        $validated = $request->validate([
            'image' => 'image|file|max:1024'
        ]);
       
        $image=$request->image;
        if($request->file('image'))
        {
            $imagePath = $validated['image'] = $request->file('image')->store('pp_artikel', 'public');
            $artikel->image = $imagePath;
        }
        
        $artikel->save();
        Alert::success('Success', 'Artikel added successfully');
        return redirect()->back();
    }
    public function show_artikel()
    {
       if (auth::id()){
            $artikel=Artikel::all();   
            return view('admin.show_artikel', compact('artikel'));
        }
        else{
            return redirect('login');
        }
    }
    public function update_artikel($id)
    {
        $artikel=Artikel::find($id);
        return view('admin.update_artikel', compact('artikel'));
        
    }
    public function delete_artikel($id)
    {
        $artikel=Artikel::find($id);
        $artikel->delete();
        Alert::success('Success', 'Artikel deleted successfully');
        return redirect()->back();
    }
    
    public function update_artikel_2(Request $request,$id)
    {
        $artikel=Artikel::find($id);
        $artikel-> title=$request->title;
        $artikel-> slug=$request->slug;
        $artikel-> body=$request->body;
        
    
        
        $image=$request->image;
        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('pp_artikel', $imagename);
        $data-> profile_photo_path=$imagename;
        }
        
        
        $artikel->save();
        Alert::success('Success', 'Artikel Updated successfully');
        return redirect()->back();
    }

    public function search_artikel(Request $request)
    {
        $search_text = $request->search_user;
        $user = user::where('name', 'LIKE', "%$search_text%")->GET();
        return view('admin.show_artikel', compact('artikel'));
    }

    //kelas

    public function view_kelas()
    {
        if (auth::id()) {
            $kelas=Kelas::all();
            return view('admin.kelas', compact('kelas')); 
        } 
        else {
            return redirect('login');
        }
        
    }

    public function add_kelas (Request $request)
    {
        $kelas= new Kelas;
        $kelas-> nama_kelas=$request->nama_kelas;
        $kelas-> detail_kelas=$request->detail_kelas;
        $kelas-> deskripsi=$request->deskripsi;

        $validated = $request->validate([
            'image' => 'image|file|max:1024'
        ]);
       
        $image=$request->image;
        if($request->file('image'))
        {
            $imagePath = $validated['image'] = $request->file('image')->store('photo_kelas', 'public');
            $kelas->image = $imagePath;
        }
        
        $kelas->save();
        Alert::success('Success', 'Kelas added successfully');
        return redirect()->back();
    }
    public function show_kelas()
    {
       if (auth::id()){
            $kelas=Kelas::all();   
            return view('admin.show_kelas', compact('kelas'));
        }
        else{
            return redirect('login');
        }
    }
    public function update_kelas($id)
    {
        $kelas=Kelas::find($id);
        return view('admin.update_kelas', compact('kelas'));
        
    }
    public function delete_kelas($id)
    {
        $kelas=Kelas::find($id);
        $kelas->delete();
        Alert::success('Success', 'Kelas deleted successfully');
        return redirect()->back();
    }
    
    public function update_kelas_2(Request $request,$id)
    {
        $kelas=Kelas::find($id);
        $kelas-> nama_kelas=$request->nama_kelas;
        $kelas-> detail_kelas=$request->detail_kelas;
        
        $validated = $request->validate([
            'image' => 'image|file|max:1024'
        ]);
       
        $image=$request->image;
        if($request->file('image'))
        {
            $imagePath = $validated['image'] = $request->file('image')->store('pp_artikel', 'public');
            $kelas->image = $imagePath;
        }
        
        $kelas->save();
        Alert::success('Success', 'Artikel Updated successfully');
        return redirect()->back();
    }

    public function search_kelas(Request $request)
    {
        $search_text = $request->search_kelas;
        $kelas = Kelas::where('nama_kelas', 'LIKE', "%$search_text%")->GET();
        return view('admin.show_kelas', compact('kelas'));
    }

    //materi
    public function view_materi()
    {
        if (auth::id()) {
            $materi=Materi::all();
            $kelas=Kelas::all();
            return view('admin.materi', compact('materi','kelas')); 
        } 
        else {
            return redirect('login');
        }
        
    }

    public function add_materi (Request $request)
    {
        $materi= new Materi;
        $materi->kelas_id=$request->kelas_id;
        $materi-> judul_materi=$request->judul_materi;

        // $validated = $request->validate([
        //     'image' => 'image|file|max:1024'
        // ]);
       
        // $image=$request->image;
        // if($request->file('image'))
        // {
        //     $imagePath = $validated['image'] = $request->file('image')->store('photo_kelas', 'public');
        //     $kelas->image = $imagePath;
        // }
        
        $materi->save();
        Alert::success('Success', 'Materi added successfully');
        return redirect()->back();
    }
    public function show_materi()
    {
       if (auth::id()){
            $materi=Materi::all();
            return view('admin.show_materi', compact('materi'));
        }
        else{
            return redirect('login');
        }
    }
    public function update_materi($id)
    {
        $materi=Materi::find($id);
        return view('admin.update_materi', compact('materi'));
        
    }
    public function delete_materi($id)
    {
        $materi=Materi::find($id);
        $materi->delete();
        Alert::success('Success', 'Materi deleted successfully');
        return redirect()->back();
    }
    
    public function update_materi_2(Request $request,$id)
    {
        $materi=Materi::find($id);
        $materi-> judul_materi=$request->judul_materi;
        
        // $validated = $request->validate([
        //     'image' => 'image|file|max:1024'
        // ]);
       
        // $image=$request->image;
        // if($request->file('image'))
        // {
        //     $imagePath = $validated['image'] = $request->file('image')->store('pp_artikel', 'public');
        //     $kelas->image = $imagePath;
        // }
        
        $materi->save();
        Alert::success('Success', 'Materi Updated successfully');
        return redirect()->back();
    }

    public function search_materi(Request $request)
    {
        $search_text = $request->search_materi;
        $materi = Materi::where('judul_materi', 'LIKE', "%$search_text%")->GET();
        return view('admin.show_materi', compact('materi'));
    }
}