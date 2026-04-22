<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Signup attempt', $request->all());

        try {
            // validation
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'cin' => 'required|string',
                'phone' => 'required|string',
                'password' => 'required|string|min:6|confirmed',
            ]);

            \Log::info('Validation passed', $validated);

            // Check if CIN already exists
            if (Patient::where('cin', $validated['cin'])->exists()) {
                return redirect()->back()->withInput()->withErrors(['cin' => 'This CIN is already registered']);
            }
            $user = null;            DB::transaction(function () use ($validated, &$user) {
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

            \Log::info('User and patient created successfully', ['user_id' => $user->id, 'role' => $user->role]);
            
            // login user
            Auth::login($user, true);

            // regenerate session
            $request->session()->regenerate();

            \Log::info('User logged in, redirecting to book page');

            // redirect to book page
            return redirect()->route('book')->with('success', 'Account created successfully!');
        } catch (\Exception $e) {
            \Log::error('Signup Error: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withInput()->with('error', 'Error creating account: ' . $e->getMessage());
        }
    }
}