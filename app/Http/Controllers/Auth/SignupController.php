<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use App\Notifications\PatientRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SignupController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Signup attempt', $request->all());

        try {
            // 🔒 EMAIL DOMAIN CHECK
            if (!str_ends_with($request->email, '@berdai.ma')) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['email' => 'Only @berdai.ma emails are allowed']);
            }

            // ✅ Validation
            $validated = $request->validate([
                'name'             => 'required|string|max:255',
                'email'            => 'required|email|unique:users,email',
                'cin'              => 'required|string',
                'phone'            => 'required|string',
                'password'         => 'required|string|min:6|confirmed',
            ]);

            Log::info('Validation passed', $validated);

            // ✅ Check if CIN already exists
            if (Patient::where('cin', $validated['cin'])->exists()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['cin' => 'This CIN is already registered']);
            }

            $user = null;

            // ✅ Create user + patient in a transaction
            DB::transaction(function () use ($validated, &$user) {
                $user = User::create([
                    'name'     => $validated['name'],
                    'email'    => $validated['email'],
                    'password' => Hash::make($validated['password']),
                    'phone'    => $validated['phone'],
                    'role'     => 'patient',
                ]);

                Patient::create([
                    'user_id' => $user->id,
                    'cin'     => $validated['cin'],
                ]);
            });

            if (!$user) {
                throw new \Exception('User creation failed silently.');
            }

            Log::info('User created successfully', [
                'user_id' => $user->id,
                'role'    => $user->role,
            ]);

            // ✅ Send notification (fixed class reference)
            $user->notify(new PatientRegistered());

            // ✅ Log in + regenerate session
            Auth::login($user, true);
            $request->session()->regenerate();

            Log::info('User logged in, redirecting to dashboard');

            // ✅ Redirect to dashboard (handles role-based redirect automatically)
            return redirect()
                ->route('dashboard')
                ->with('success', 'Account created successfully!');

        } catch (\Exception $e) {
            Log::error('Signup Error: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating account: ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'Email ou mot de passe incorrect.',
            ])->onlyInput('email');
        }

        $user = Auth::user();

        // ✅ Check if account is active (if you use is_active)
        if (isset($user->is_active) && !$user->is_active) {
            Auth::logout();
            return back()->withErrors(['email' => 'Compte désactivé.']);
        }

        // ✅ Regenerate AFTER successful auth (not before, like you had)
        $request->session()->regenerate();

        Log::info('User logged in', ['user_id' => $user->id, 'role' => $user->role]);

        // ✅ Use the /dashboard route which already handles role redirects
        return redirect()->route('dashboard');
    }
}