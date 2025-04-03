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
    
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
    
            if ($user->role == 'manager' || $user->role == 'resepsionis') {
                return redirect('/admin/index');
            } else {
                return redirect('/hotel/dashboard');
            }
        }
    
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
