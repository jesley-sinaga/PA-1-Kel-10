<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan Form Register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses Registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:manager,resepsionis,tamu'
        ]);
    
        // Validasi reCAPTCHA
        $recaptchaSecret = env('GOOGLE_RECAPTCHA_SECRET');
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $recaptchaVerify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
        $recaptchaData = json_decode($recaptchaVerify);
    
        if (!$recaptchaData->success) {
            return response()->json(['message' => 'reCAPTCHA verification failed'], 422);
        }
    
        // Simpan User
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    
        return response()->json(['success' => true, 'message' => 'Registration successful!']);
    }
    

    // Menampilkan Form Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses Login
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Batasi percobaan login
    if (session()->has('login_attempts') && session('login_attempts') >= 5) {
        return back()->withErrors(['email' => 'Terlalu banyak percobaan login. Coba lagi nanti.']);
    }

    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();

        // Reset percobaan login jika berhasil
        session()->forget('login_attempts');

        // Redirect berdasarkan role
        if ($user->role == 'manager' || $user->role == 'resepsionis') {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/');
        }
    }

    // Tambahkan percobaan login
    session()->increment('login_attempts', 1);

    return back()->withErrors(['email' => 'Email atau password salah.']);
}
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Anda telah logout.');
}

}
