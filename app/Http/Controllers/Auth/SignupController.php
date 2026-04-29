<?php

namespace App\Http\Controllers\Auth;
use App\Notifications\PatientRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Signup attempt', $request->all());

        try {

            // 🔒 EMAIL DOMAIN CHECK (IMPORTANT)
            if (!str_ends_with($request->email, '@berdai.ma')) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'email' => 'Only @berdai.ma emails are allowed'
                    ]);
            }

            // validation
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'cin' => 'required|string',
                'phone' => 'required|string',
                'password' => 'required|string|min:6|confirmed',
            ]);

            Log::info('Validation passed', $validated);

            // Check if CIN already exists
            if (Patient::where('cin', $validated['cin'])->exists()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'cin' => 'This CIN is already registered'
                    ]);
            }

            $user = null;

            DB::transaction(function () use ($validated, &$user) {

                // create user
                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => Hash::make($validated['password']),
                    'phone' => $validated['phone'],
                    'role' => 'patient',
                ]);

                // create patient record
                Patient::create([
                    'user_id' => $user->id,
                    'cin' => $validated['cin'],
                ]);
            });

            if ($user) {
                Log::info('User created successfully', [
                    'user_id' => $user->id,
                    'role' => $user->role
                ]);
$user->notify(new \App\Notifications\PatientRegistered());                // login user
                Auth::login($user, true);
            }

            // regenerate session
            $request->session()->regenerate();

            Log::info('User logged in successfully');

            // redirect
            return redirect()
                ->route('patient.dashboard')
                ->with('success', 'Account created successfully!');

        } catch (\Exception $e) {

            Log::error('Signup Error: ' . $e->getMessage(), [
                'exception' => $e
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating account: ' . $e->getMessage());
        }
        $request->validate([
    'email' => [
        'required',
        'email',
        'regex:/^[a-zA-Z0-9._%+-]+@berdai\.ma$/'
    ],
]);
    }
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $request->session()->regenerate();

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role === 'patient') {
            return redirect('/patient/dashboard');
        }

        if ($user->role === 'doctor') {
            return redirect('/doctor/dashboard');
        }

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }
    }

    return back()->withErrors([
        'email' => 'Invalid credentials',
    ]);
}
}