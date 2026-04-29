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
        $total = 0;

        if ($user->isPatient()) {
            $total = Appointment::where('patient_id', $user->patient->id)->count();
        } elseif ($user->isMedecin()) {
            $total = Appointment::where('medecin_id', $user->medecin->id)->count();
        }

        return view('dashboard', compact('total'));
    }
}
