<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorSignupController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'cin'       => 'required|string|unique:doctors,cin',
            'phone'     => 'required|string',
            'specialite'=> 'nullable|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
        ]);

        $user = null;

        DB::transaction(function () use ($validated, &$user) {
            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
                'phone'    => $validated['phone'],
                'role'     => 'medecin',
            ]);

            Doctor::create([
                'user_id'    => $user->id,
                'cin'        => $validated['cin'],
                'specialite' => $validated['specialite'] ?? 'Généraliste',
                'verified'   => false, // ← admin must verify
            ]);
        });

        // ✅ Log in and redirect to dashboard
        Auth::login($user, true);
        $request->session()->regenerate();

        return redirect()->route('dashboard')
            ->with('success', 'Account created! Awaiting admin verification.');
    }
}