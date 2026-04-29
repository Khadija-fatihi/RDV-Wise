<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDoctorController extends Controller
{
    public function index(Request $request)
    {
        $query = Doctor::with('user');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            })->orWhere('specialite', 'like', "%$search%");
        }

        if ($request->filled('status')) {
            $query->where('verified', $request->status === 'verified');
        }

        $doctors        = $query->latest()->paginate(15);
        $totalDoctors   = Doctor::count();
        $verifiedDoctors = Doctor::where('verified', true)->count();
        $pendingDoctors  = Doctor::where('verified', false)->count();
        $topRatedDoctors = Doctor::where('rating', '>=', 4.5)->count();

        return view('admin.Admin-Manage-Doctors', compact(
            'doctors',
            'totalDoctors',
            'verifiedDoctors',
            'pendingDoctors',
            'topRatedDoctors'
        ));
    }

    public function create()
    {
        return view('admin.admin-doctor-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:8|confirmed',
            'specialite' => 'required|string|max:255',
            'phone'      => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'medecin',
            'phone'    => $request->phone,
        ]);

        Doctor::create([
            'user_id'    => $user->id,
            'specialite' => $request->specialite,
            'verified'   => false,
        ]);

        return redirect()->route('admin.doctors')
            ->with('success', 'Doctor created successfully.');
    }

    public function edit($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('admin.admin-doctor-edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);

        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $doctor->user->id,
            'specialite' => 'required|string|max:255',
            'phone'      => 'nullable|string|max:20',
        ]);

        $doctor->user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $doctor->update([
            'specialite' => $request->specialite,
        ]);

        return redirect()->route('admin.doctors')
            ->with('success', 'Doctor updated successfully.');
    }

    public function destroy($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        $doctor->user->delete();
        return redirect()->route('admin.doctors')
            ->with('success', 'Doctor deleted successfully.');
    }

    public function verify($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->update(['verified' => true]);
        return redirect()->route('admin.doctors')
            ->with('success', 'Doctor verified successfully.');
    }
}
