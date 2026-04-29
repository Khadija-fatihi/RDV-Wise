<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PatientAuthController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminPatientController;
use App\Http\Controllers\Admin\AdminAppointmentController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::post('/login', [PatientAuthController::class, 'login'])->middleware('guest')->name('login.post');

Route::get('/login/identify', function () {
    return view('auth.identify');
})->middleware('guest')->name('auth.identify');

Route::get('/auth/doctor', function () {
    return view('auth.doctor-login');
})->middleware('guest')->name('auth.doctor');

Route::get('/signup-patient', function () {
    return view('auth.signup-patient');
})->middleware('guest')->name('auth.signup.patient');

Route::post('/signup-patient', [SignupController::class, 'store'])->middleware('guest')->name('auth.signup.patient.store');

Route::post('/logout', [PatientAuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard Redirect
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->isPatient()) {
        return redirect()->route('patient.dashboard');
    } elseif ($user->isMedecin()) {
        return redirect()->route('doctor.dashboard');
    } elseif ($user->isAdmin()) {
        return redirect()->route('admin.statistics');
    }
    return redirect('/');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Patient Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/book', function () {
        $doctors = \App\Models\Doctor::with('user')->where('verified', true)->get();
        return view('Appointment.book', compact('doctors'));
    })->name('book');

    Route::get('/visits', function () {
        return view('visits');
    })->name('visits');

    Route::get('/profile', function () {
        return view('patient-profile');
    })->name('profile');

    Route::get('/notifications', function () {
        return view('notifications.notifications-patient');
    })->name('notifications');

    Route::get('/dashboard/patient', [HomeController::class, 'patientDashboard'])->name('patient.dashboard');

    Route::get('/lab-results', function () {
        return view('Lab-Results-Diagnostic-Reports');
    })->name('lab.results');

    Route::get('/ai-checker', function () {
        return view('Ai.AI-Symptom-Checker');
    })->name('ai.checker');

    Route::get('/record-access', function () {
        return view('Patient-Record-Access-Request');
    })->name('record.access');

    Route::get('/access-response', function () {
        return view('Patient-Access-Response');
    })->name('access.response');

    Route::resource('appointments', AppointmentController::class)
        ->only(['index', 'create', 'store', 'show', 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Doctor Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard/doctor', [HomeController::class, 'doctorDashboard'])->name('doctor.dashboard');

    Route::get('/doctor/schedule', function () {
        return view("doctor's-shedule");
    })->name('doctor.schedule');

    Route::get('/notifications-doctor', function () {
        return view('notifications.notifications-doctor');
    })->name('doctor.notifications');

    Route::get('/patients', function () {
        return view('Patient-Management');
    })->name('patients.index');

    Route::get('/doctors/{id}', function () {
        return view('doctors.Doctor-Professional-Profile');
    })->name('doctor.profile');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Statistics Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('statistics');

    // Support page
    Route::get('/support', function () {
        return view('admin.Admin-support');
    })->name('support');

    // Admin Notifications
    Route::get('/notifications', [AdminController::class, 'notifications'])->name('notifications');

    // --- Doctors ---
    Route::get('/doctors', [AdminDoctorController::class, 'index'])->name('doctors');
    Route::get('/doctors/create', [AdminDoctorController::class, 'create'])->name('doctors.create');
    Route::post('/doctors', [AdminDoctorController::class, 'store'])->name('doctors.store');
    Route::get('/doctors/{id}/edit', [AdminDoctorController::class, 'edit'])->name('doctors.edit');
    Route::put('/doctors/{id}', [AdminDoctorController::class, 'update'])->name('doctors.update');
    Route::delete('/doctors/{id}', [AdminDoctorController::class, 'destroy'])->name('doctors.destroy');
    Route::patch('/doctors/{id}/verify', [AdminDoctorController::class, 'verify'])->name('doctors.verify');

    // --- Patients ---
    Route::get('/patients', [AdminPatientController::class, 'index'])->name('patients');
    Route::get('/patients/{id}', [AdminPatientController::class, 'show'])->name('patients.show');
    Route::get('/patients/{id}/edit', [AdminPatientController::class, 'edit'])->name('patients.edit');
    Route::put('/patients/{id}', [AdminPatientController::class, 'update'])->name('patients.update');
    Route::delete('/patients/{id}', [AdminPatientController::class, 'destroy'])->name('patients.destroy');

    // --- Appointments ---
    Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('appointments');
    Route::patch('/appointments/{id}/cancel', [AdminAppointmentController::class, 'cancel'])->name('appointments.cancel');
    Route::get('/appointments/{id}/reschedule', [AdminAppointmentController::class, 'reschedule'])->name('appointments.reschedule');
    Route::patch('/appointments/{id}/reschedule', [AdminAppointmentController::class, 'doReschedule'])->name('appointments.doReschedule');
});