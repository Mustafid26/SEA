<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman form login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Menangani permintaan login yang masuk.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ], [
            'name.required' => 'Nama pengguna wajib diisi.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        // 2. Ambil input dari request
        $name = $request->input('name');
        $password = $request->input('password');

        // 3. Cari pengguna secara manual berdasarkan 'name'
        $user = User::where('name', $name)->first();

        // 4. Debug: Log informasi user
        if ($user) {
            Log::info('User found', [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'is_email_verified' => !is_null($user->email_verified_at)
            ]);
        } else {
            Log::warning('User not found: ' . $name);
        }

        // 5. Periksa apakah pengguna ditemukan DAN password-nya cocok
        if ($user && Hash::check($password, $user->password)) {

            // 6. Debug: Log sebelum login
            Log::info('Password correct, attempting login for user: ' . $user->name);

            // 7. Jika semua pemeriksaan lolos, loginkan pengguna secara manual
            Auth::login($user, $request->filled('remember'));

            // Debug: Konfirmasi user sudah login
            Log::info('User logged in successfully', [
                'auth_check' => Auth::check(),
                'auth_user_id' => Auth::id(),
                'intended_url' => session('url.intended', '/redirect')
            ]);

            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Debug: Coba redirect dan log hasilnya
            $redirectUrl = '/redirect';
            Log::info('Redirecting to: ' . $redirectUrl);

            // Coba berbagai opsi redirect
            // Opsi 1: Redirect langsung
            return redirect($redirectUrl);
            
            // Opsi 2: Jika opsi 1 tidak berhasil, uncomment yang di bawah dan comment yang di atas
            // return redirect()->intended($redirectUrl);
            
            // Opsi 3: Jika masih tidak berhasil, coba redirect ke route name
            // return redirect()->route('redirect');
        }

        // 8. Debug: Password tidak cocok atau user tidak ditemukan
        Log::warning('Login failed', [
            'user_found' => !is_null($user),
            'password_check' => $user ? Hash::check($password, $user->password) : false
        ]);

        // 9. Jika pengguna tidak ditemukan ATAU password salah, kembalikan error umum
        return back()->withErrors([
            'name' => 'Nama pengguna atau kata sandi yang Anda masukkan salah.',
        ])->onlyInput('name');
    }

    /**
     * Mengeluarkan pengguna dari aplikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}