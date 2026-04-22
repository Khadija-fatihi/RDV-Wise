<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientAuthController extends Controller
{
    public function login(Request $request)
    {
        \Log::info('Login attempt', [
            'email' => $request->email,
            'has_password' => !empty($request->password),
            'csrf_token_present' => $request->has('_token'),
            'session_id' => $request->session()->getId(),
        ]);

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            \Log::info('Login successful for user: ' . auth()->user()->email);

            // Redirect based on user role
            if (auth()->user()->isPatient()) {
                return redirect()->route('book');
            } elseif (auth()->user()->isMedecin()) {
                return redirect()->route('doctor.dashboard');
            }

            return redirect('/dashboard');
        }

        \Log::warning('Login failed for email: ' . $request->email);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'patient',
        ]);

        // 👇 ندخلوه مباشرة بعد signup
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('book');
    }
}