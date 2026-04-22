<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

class DashboardController extends Controller
{
     public function index()
    {
        $user = Auth::user();

        $total = Appointment::where('patient_id', $user->id)->count();

        return view('dashboard', compact('total'));
    }
}
