<?php

namespace App\Http\Controllers;
use App\Models\Foto;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Answer;
use App\Models\Materi;
use App\Models\Submit;
use App\Models\Artikel;
use App\Models\Question;
use App\Models\Penilaian;
use App\Models\PostestUser;
use App\Models\PretestUser;
use App\Models\KontenMateri;
use Illuminate\Http\Request;
use App\Models\AnswerPostest;
use App\Models\QuestionPostest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function view_foto()
    {
        if (auth::id()) {
            $foto=Foto::all();
            return view('admin.fotber', compact('foto')); 
        } 
        else {
            return redirect('login');
        }
        
    }
    
    public function add_foto (Request $request)
    {
        $foto= new Foto;
        $foto-> title=$request->title;
        $foto-> desc=$request->desc;
        $validated = $request->validate([
            'image' => 'image|file|max:10240'
        ]);
       
        $image=$request->image;
        if($request->file('image'))
        {
            $imagePath = $validated['image'] = $request->file('image')->store('foto_beranda', 'public');
            $foto->image = $imagePath;
        }
        
        $foto->save();
        Alert::success('Success', 'Foto added successfully');
        return redirect()->back();
    }

    
    public function show_foto()
    {
       if (auth::id()){
            $foto=Foto::all();   
            return view('admin.show_fotber', compact('foto'));
        }
        else{
            return redirect('login');
        }
    }
    public function update_foto($id)
    {
        $foto=Foto::find($id);
        return view('admin.update_fotber', compact('foto'));
        
    }
    public function delete_foto($id)
    {
        $foto=Foto::find($id);
        $foto->delete();
        Alert::success('Success', 'Foto deleted successfully');
        return redirect()->back();
    }
    public function update_foto_2(Request $request, $id)
    {
        // Find the existing photo record
        $foto = Foto::find($id);

        // Update the title and description
        $foto->title = $request->title;
        $foto->desc = $request->desc;

        // Validate the new image file
        $validated = $request->validate([
            'image' => 'image|file|max:10240'
        ]);

        // Check if a new image file is uploaded
        $validated = $request->validate([
            'image' => 'image|file|max:10240'
        ]);
       
        if ($request->file('image')) {
            // Delete the old image file from storage
            if ($foto->image) {
                Storage::disk('public')->delete($foto->image);
            }

            $originalName = $request->image->getClientOriginalName();
            
            $imagePath = $originalName;
            
            // Store the new image file
            $imagePath = $validated['image'] = $request->file('image')->storeAs('foto_beranda', $originalName, 'public');

            // Update the image path in the database
            $foto->image = $imagePath;
        }

        // Save the updated photo record
        $foto->save();

        // Display success message and redirect back
        Alert::success('Success', 'Foto Updated successfully');
        return redirect()->back();
    }

    
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
        $data-> ID_Sekari=$request->ID_Sekari;
        $data-> nama_lengkap=$request->nama_lengkap;
        $data-> nik=$request->nik;  
        $data-> rombel=$request->rombel;  
        $data-> password=bcrypt($request->password);
        $data-> role=$request->role;
        if($request->role=='admin')
        {
            $data -> usertype = $request-> usertype = 1;
        }
        else if($request->role == 'sekari'){
            $data -> usertype = $request-> usertype = 2;
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
        $data->ID_Sekari=$request->ID_Sekari;
        $data->name=$request->name;
        $data->rombel=$request->rombel;
        $data->nik=$request->nik;
        $data->role=$request->role;
        $data->points=$request->points;
        if($request->role=='admin')
        {
            $data -> usertype = $request-> usertype = 1;
        }
        else if($request->role == 'sekari'){
            $data -> usertype = $request-> usertype = 2;
        }
        else
        {
            $data -> usertype = $request-> usertype = 0;
        }
        
        if($request->filled('password')) {
            $data->password = Hash::make($request->input('password'));
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
    
   
    public function nilai_user()
    {
       if (auth::id()){
            $nilai = PretestUser::with(['kelas', 'user'])->get();
            return view('admin.show_nilai', compact('nilai'));
        }
        else{
            return redirect('login');
        }
    }
    
    
    public function update_nilai_pretest($id)
    {
        $data=PretestUser::find($id);
        return view('admin.update_nilai_pretest', compact('data'));
        
    }

    public function update_nilai_pretest_2(Request $request,$id)
    {
        $data=PretestUser::find($id);
        $data->score=$request->score;
        $data->save();
        Alert::success('Success', 'Nilai Pretest Updated successfully');
        return redirect()->back();
    }

    public function nilai_postest_user()
    {
       if (auth::id()){
            $nilai = PostestUser::with(['kelas', 'user'])->get();
            return view('admin.show_nilai_postest', compact('nilai'));
        }
        else{
            return redirect('login');
        }
    }

    public function update_nilai_postest($id)
    {
        $data=PostestUser::find($id);
        return view('admin.update_nilai_postest', compact('data'));
        
    }

    public function update_nilai_postest_2(Request $request,$id)
    {
        $data=PostestUser::find($id);
        $data->score=$request->score;
        $data->save();
        Alert::success('Success', 'Nilai Postest Updated successfully');
        return redirect()->back();
    }


    //pretest_user
    public function pretest_user()
    {
       if (auth::id()){
            $userp = PretestUser::with(['postestUser','kelas', 'user'])->get();
            return view('admin.show_pretest_user', compact('userp'));
        }
        else{
            return redirect('login');
        }
    }

    public function delete_pretest_user($id)
    {
        $nilai=PretestUser::find($id);
        $nilai->delete();
        Alert::success('Success', 'Riwayat deleted successfully');
        return redirect()->back();
    }

    //postest_user
    public function postest_user()
    {
       if (auth::id()){
            $userpost = PostestUser::with(['kelas', 'user'])->get();
            return view('admin.show_postest_user', compact('userpost'));
        }
        else{
            return redirect('login');
        }
    }

    public function delete_postest_user($id)
    {
        $nilai=PostestUser::find($id);
        $nilai->delete();
        Alert::success('Success', 'Riwayat deleted successfully');
        return redirect()->back();
    }

    public function show_jawaban($id)
    {
        $answers = Answer::with(['user', 'question'])
            ->where('user_id', $id)
            ->get();

        return view('admin.show_jawaban', compact('answers'));
    }

    public function show_jawaban_postest($id)
    {
        $answers = AnswerPostest::with(['user', 'question'])
            ->where('user_id', $id)
            ->get();

        return view('admin.show_jawaban_postest', compact('answers'));
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
            'image' => 'image|file|max:10240'
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
        
    
        
        $validated = $request->validate([
            'image' => 'image|file|max:10240'
        ]);
       
        if ($request->file('image')) {
            // Delete the old image file from storage
            if ($artikel->image) {
                Storage::disk('public')->delete($artikel->image);
            }

            $originalName = $request->image->getClientOriginalName();
            
            $imagePath = $originalName;
            
            // Store the new image file
            $imagePath = $validated['image'] = $request->file('image')->storeAs('pp_artikel', $originalName, 'public');

            // Update the image path in the database
            $artikel->image = $imagePath;
        }
        
        
        $artikel->save();
        Alert::success('Success', 'Artikel Updated successfully');
        return redirect()->back();
    }

    public function search_artikel(Request $request)
    {
        $search_text = $request->search_user;
        $artikel = Artikel::where('title', 'LIKE', "%$search_text%")->GET();
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
        $kelas-> rombel=$request->rombel;
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
        $kelas->nama_kelas=$request->nama_kelas;
        $kelas->detail_kelas=$request->detail_kelas;
        $kelas-> rombel=$request->rombel;
        $kelas-> deskripsi=$request->deskripsi;
        if ($request->file('image')) {
            // Delete the old image file from storage
            if ($kelas->image) {
                Storage::disk('public')->delete($kelas->image);
            }

            $originalName = $request->image->getClientOriginalName();
            
            $imagePath = $originalName;
            
            // Store the new image file
            $imagePath = $validated['image'] = $request->file('image')->storeAs('photo_kelas', $originalName, 'public');

            // Update the image path in the database
            $kelas->image = $imagePath;
        }
            
        $kelas->save();
        Alert::success('Success', 'Kelas Updated successfully');
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
        $materi->save();
        Alert::success('Success', 'Materi added successfully');
        return redirect()->back();
    }
    public function show_materi()
    {
       if (auth::id()){
            $materi=Materi::all();
            $kelas=Kelas::all();
            foreach ($materi as $m) {
                $m->total_pretest = Question::where('kelas_id', $m->kelas_id)->count();
                $m->total_postest = QuestionPostest::where('kelas_id', $m->kelas_id)->count();
            }
            return view('admin.show_materi', compact('materi','kelas'));
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
    
    public function view_konten($id)
    {
        if (auth::id()) {
            $konten=KontenMateri::all();
            $materi=Materi::find($id);
          
            
            return view('admin.konten', compact('konten','materi')); 
        } 
        else {
            return redirect('login');
        }
        
    }
    public function add_konten(Request $request)
    {
        
        $konten = new KontenMateri;
        $kelas = new Kelas;
        $konten->materi_id = $request->materi_id;
        $konten->kelas_id = $request->kelas_id;
        $konten->desc = $request->desc;

        if ($request->selection == 'add_konten') {
            $validated = $request->validate([
                'konten' => 'required|mimes:ppt,pptx,pdf|max:10000'
            ]);
            
            if ($request->file('konten')) {
                $originalName = $request->file('konten')->getClientOriginalName();              
                $filePath = $originalName;
                $request->file('konten')->storeAs('powerpoint_files', $originalName, 'public');              
                $konten->konten = $filePath;
            }
        } elseif ($request->selection == 'add_pretest') {
            $pretest = new Question;
            $pretest->kelas_id = $request->kelas_id;          
            $pretest->question = $request->question;
            $pretest->option1 = $request->option1;
            $pretest->option2 = $request->option2;
            $pretest->option3 = $request->option3;
            $pretest->option4 = $request->option4;
            $pretest->correct_answer = $request->correct_answer;
            $pretest->save();
            Alert::success('Success', 'Soal added successfully');
            return redirect()->back();
            
        } elseif ($request->selection == 'add_postest') {
            $postest = new QuestionPostest;
            $postest->kelas_id = $request->kelas_id;
            
            $postest->question = $request->question;
            $postest->option1 = $request->option1;
            $postest->option2 = $request->option2;
            $postest->option3 = $request->option3;
            $postest->option4 = $request->option4;
            $postest->correct_answer = $request->correct_answer;
            $postest->save();
            Alert::success('Success', 'Soal added successfully');
            return redirect()->back();
        }else {
            return redirect()->back()->withErrors('Please select an option.');
        }

        $konten->save();
        Alert::success('Success', 'Konten added successfully');
        return redirect()->back();
    }


    public function show_konten()
    {
       if (auth::id()){
            $konten=KontenMateri::all();
            $konten = KontenMateri::with(['kelas', 'materi'])->get();
            foreach ($konten as $k) {
                $k->total_pretest = Question::where('kelas_id', $k->kelas_id)->count();
            }
            return view('admin.show_konten', compact('konten'));
        }
        else{
            return redirect('login');
        }
    }

    public function update_konten($id)
    {
        $konten=KontenMateri::find($id);
        return view('admin.update_konten', compact('konten'));
        
    }
    public function delete_konten($id)
    {
        $konten=KontenMateri::find($id);
        $konten->delete();
        Alert::success('Success', 'Konten deleted successfully');
        return redirect()->back();
    }
    
    public function update_konten_2(Request $request,$id)
    {
        $konten=KontenMateri::find($id);
        $konten->desc = $request->desc;
        $validated = $request->validate([
            'konten' => 'nullable|mimes:ppt,pptx,pdf|max:10000'
        ]);
        
        if ($request->file('konten')) {
            if($konten->konten){
                Storage::disk('public')->delete($konten->konten);
            }
            // Dapatkan nama asli file
            $originalName = $request->file('konten')->getClientOriginalName();
            
            // Menyimpan file dengan nama asli ke folder 'powerpoint_files' di storage 'public'
            $filePath = $originalName;
            $request->file('konten')->storeAs('powerpoint_files', $originalName, 'public');
            
            // Menyimpan path file ke dalam atribut 'konten'
            $konten->konten = $filePath;
        }
        
        $konten->save();
        Alert::success('Success', 'Konten Updated successfully');
        return redirect()->back();
    }

    public function show_pretest($kelas_id)
    {
        if (auth::id()) {
            $pretest = Question::where('kelas_id', $kelas_id)->get();
            $materi = Materi::where('kelas_id', $kelas_id)->get();;
            $kelas=Kelas::all();
            
            return view('admin.show_pretest', compact('pretest','materi','kelas')); 
        } 
        else {
            return redirect('login');
        }
        
    }
    public function update_pretest($id)
    {
        $pretest=Question::find($id);
        return view('admin.update_pretest', compact('pretest'));
        
    }
    public function delete_pretest($id)
    {
        $pretest=Question::find($id);
        $pretest->delete();
        Alert::success('Success', 'Soal deleted successfully');
        return redirect()->back();
    }
    
    public function update_pretest_2(Request $request,$id)
    {
            $pretest=Question::find($id);
            $pretest->kelas_id = $request->kelas_id;
            
            $pretest->question = $request->question;
            $pretest->option1 = $request->option1;
            $pretest->option2 = $request->option2;
            $pretest->option3 = $request->option3;
            $pretest->option4 = $request->option4;
            $pretest->correct_answer = $request->correct_answer;
            $pretest->save();
        Alert::success('Success', 'Soal Updated successfully');
        return redirect()->back();
    }

    public function search_pretest(Request $request)
    {
        $search_text = $request->search_soal;
        $pretest = Question::where('question', 'LIKE', "%$search_text%")->GET();
        return view('admin.show_pretest', compact('pretest'));
    }
    public function show_postest($kelas_id)
    {
        if (auth::id()) {
            $postest=QuestionPostest::where('kelas_id', $kelas_id)->get();
            $materi=Materi::where('kelas_id', $kelas_id)->get();
            $kelas=Kelas::all();
            
            return view('admin.show_postest', compact('postest','materi','kelas')); 
        } 
        else {
            return redirect('login');
        }
        
    }
    public function update_postest($id)
    {
        $postest=QuestionPostest::find($id);
        return view('admin.update_postest', compact('postest'));
        
    }
    public function delete_postest($id)
    {
        $postest=QuestionPostest::find($id);
        $postest->delete();
        
        Alert::success('Success', 'Soal deleted successfully');
        return redirect()->back();
    }
    
    public function update_postest_2(Request $request,$id)
    {
            $postest=QuestionPostest::find($id);
            $postest->kelas_id = $request->kelas_id;
            
            $postest->question = $request->question;
            $postest->option1 = $request->option1;
            $postest->option2 = $request->option2;
            $postest->option3 = $request->option3;
            $postest->option4 = $request->option4;
            $postest->correct_answer = $request->correct_answer;
            $postest->save();
        Alert::success('Success', 'Soal Updated successfully');
        return redirect()->back();
    }

    public function search_postest(Request $request)
    {
        $search_text = $request->search_soal;
        $postest = QuestionPostest::where('question', 'LIKE', "%$search_text%")->GET();
        return view('admin.show_postest', compact('postest'));
    }
    public function view_form()
    {
        if (auth::id()) {
            $penilaian=Penilaian::all();
            return view('admin.add_formpenilaian', compact('penilaian')); 
        } 
        else {
            return redirect('login');
        }
        
    }
    public function add_formpenilaian(Request $request)
    {
        $penilaian = new Penilaian;
        $penilaian->judul = $request->judul;
        $penilaian->detail = $request->detail;
        $penilaian->rombel = $request->rombel;
        $validated = $request->validate([
            'image' => 'image|file|max:1024'
        ]);
       
        $image=$request->image;
        if($request->file('image'))
        {
            $imagePath = $validated['image'] = $request->file('image')->store('photo_kelas', 'public');
            $penilaian->image = $imagePath;
        }
        $penilaian->save();
        Alert::success('Success', 'Penilaian added successfully');
        return redirect()->back();
    }
    public function show_formpenilaian()
    {
       if (auth::id()){
            $penilaian=Penilaian::all();   
            return view('admin.show_formpenilaian', compact('penilaian'));
        }
        else{
            return redirect('login');
        }
    }
    public function update_formpenilaian($id)
    {
        $penilaian=Penilaian::find($id);
        return view('admin.update_formpenilaian', compact('penilaian'));
        
    }
    public function update_formpenilaian_2(Request $request,$id)
    {
        $penilaian=Penilaian::find($id);
        $penilaian->judul=$request->judul;
        $penilaian->detail=$request->detail;
        $penilaian-> rombel=$request->rombel;
        if ($request->file('image')) {
            // Delete the old image file from storage
            if ($penilaian->image) {
                Storage::disk('public')->delete($penilaian->image);
            }

            $originalName = $request->image->getClientOriginalName();
            
            $imagePath = $originalName;
            
            // Store the new image file
            $imagePath = $validated['image'] = $request->file('image')->storeAs('photo_kelas', $originalName, 'public');

            // Update the image path in the database
            $penilaian->image = $imagePath;
        }
            
        $penilaian->save();
        Alert::success('Success', 'Kelas Updated successfully');
        return redirect()->back();
    }
    public function delete_form($id)
    {
        $penilaian=Penilaian::find($id);
        $penilaian->delete();
        
        Alert::success('Success', 'Form Penilaian deleted successfully');
        return redirect()->back();
    }
    public function show_penilaian()
    {
        if (auth::id()) {
            $penilaian=Submit::all();
            return view('admin.show_penilaian', compact('penilaian')); 
        } 
        else {
            return redirect('login');
        }
        
    }
    public function delete_penilaian($id)
    {
        $penilaian=Submit::find($id);
        $penilaian->delete();
        
        Alert::success('Success', 'Penilaian deleted successfully');
        return redirect()->back();
    }
}