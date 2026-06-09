<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PatientAuthController extends Controller
{
    public function login(Request $request)
    {
        Log::info('Login attempt', [
            'email' => $request->email,
            'has_password' => !empty($request->password),
            'csrf_token_present' => $request->has('_token'),
            'session_id' => $request->session()->getId(),
        ]);

        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = auth()->user();
            if (!$user instanceof \App\Models\User) {
                return redirect()->route('login')->withErrors(['email' => 'Unable to resolve your account role.']);
            }

            Log::info('Login successful for user: ' . $user->email);

            return redirect($user->dashboardRoute());
        }

        Log::warning('Login failed for email: ' . $request->email);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'patient',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('book');
    }
}