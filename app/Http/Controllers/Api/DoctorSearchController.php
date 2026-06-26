<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorSearchController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->filled('city') || !$request->filled('specialty')) {
            return response()->json([]);
        }

        $doctors = Doctor::with('user')
            ->where('verified', true)
            ->where('city', $request->city)
            ->where('specialite', $request->specialty)
            ->get()
            ->map(function (Doctor $doctor) {
                return [
                    'id'          => $doctor->id,
                    'name'        => $doctor->name ?? $doctor->user?->name,
                    'specialty'   => $doctor->specialite,
                    'city'        => $doctor->city,
                    'address'     => $doctor->address ?: $doctor->cabinet,
                    'cabinet'     => $doctor->cabinet,
                    'bio'         => $doctor->bio,
                    'phone'       => $doctor->phone,
                    'email'       => $doctor->email ?? $doctor->user?->email,
                    'photo'       => $doctor->photo ?? $this->defaultPhoto($doctor),
                    'price'       => $doctor->tarif ? number_format($doctor->tarif, 2, '.', '') : '0.00',
                    'rating'      => $doctor->rating ?? $this->fallbackRating($doctor),
                ];
            });

        return response()->json($doctors);
    }

    private function fallbackRating(Doctor $doctor): float
    {
        return round(4.0 + ($doctor->id % 5) * 0.2, 1);
    }

    private function defaultPhoto(Doctor $doctor): string
    {
        $label = urlencode($doctor->name ?? $doctor->user?->name ?? 'Doctor');
        return "https://ui-avatars.com/api/?name={$label}&background=0D8ABC&color=ffffff&rounded=true";
    }
}
