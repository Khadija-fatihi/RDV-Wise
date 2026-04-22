<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PatientAuthController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\HomeController;

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
})->name('login');

Route::post('/login', [PatientAuthController::class, 'login'])->name('login.post');

Route::get('/login/identify', function () {
    return view('auth.identify');
})->name('auth.identify');

Route::post('/login/identify', function () {
    return redirect()->route('auth.identify');
});

Route::get('/auth/doctor', function () {
    return view('auth.doctor-login');
})->name('auth.doctor');

Route::get('/signup-patient', function () {
    return view('auth.signup-patient');
})->name('auth.signup.patient');

Route::post('/signup-patient', [SignupController::class, 'store'])->name('auth.signup.patient.store');

Route::post('/logout', [PatientAuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Patient Routes (auth required)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/book', function () {
        return view('Appointment.book');
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

});

/*
|--------------------------------------------------------------------------
| Doctor Routes (auth required)
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
// use App\Http\Controllers\Auth\PatientAuthController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\HomeController;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\AppointmentController;
// use App\Http\Controllers\Auth\SignupController;



// Route::get('/', function () {
//     \Log::info('Home route accessed', [
//         'is_authenticated' => auth()->check(),
//         'user_id' => auth()->id(),
//         'user_role' => auth()->check() ? auth()->user()->role : null,
//     ]);

//     if (auth()->check()) {
//         // User is logged in, redirect to their main page
//         if (auth()->user()->isPatient()) {
//             return redirect()->route('book');
//         } elseif (auth()->user()->isDoctor()) {
//             return redirect()->route('doctor.dashboard');
//         }
//         return redirect('/dashboard');
//     }
//     // User is not logged in, show welcome page
   
//     return view('welcome');
// })->name('home');

// Route::view('/login', 'auth.login')->name('login');
// Route::post('/login', [PatientAuthController::class, 'login'])->name('login.post');
// Route::post('/login/identify', function (Request $request) {
//     return redirect()->route('auth.identify');
// });

// Route::view('/login/identify', 'auth.identify')->name('auth.identify');
// Route::post('/login/identify', function (Request $request) {
//     return redirect()->route('auth.identify');
// });

// Route::get('/signup-patient', function () {
//     return view('auth.signup-patient');
// })->name('auth.signup.patient');

// Route::post('/signup-patient', [SignupController::class, 'store'])->name('auth.signup.patient.store');

// Route::view('/auth/doctor', 'auth.doctor-login')->name('auth.doctor');

// Route::middleware(['auth', 'role:patient'])->group(function () {
//     Route::view('/book', 'Appointment.book')->name('book');
//     Route::view('/visits', 'visits')->name('visits');
//     Route::view('/profile', 'profile')->name('profile');
//     Route::view('/notifications-patient', 'notifications.notifications-patient')->name('notifications-patient');

//     Route::get('/dashboard/patient', [HomeController::class, 'patientDashboard'])
//         ->name('patient.dashboard');
// });

// Route::middleware(['auth', 'role:medecin'])->group(function () {
//     Route::get('/dashboard/doctor', [HomeController::class, 'doctorDashboard'])
//         ->name('doctor.dashboard');
//     Route::view('/notifications-doctor', 'notifications.notifications-doctor')->name('doctor.notifications');
// });

// Route::middleware('auth')->get('/notifications', function () {
//     $user = auth()->user();

//     if ($user->isMedecin()) {
//         return redirect()->route('doctor.notifications');
//     }

//     if ($user->isPatient()) {
//         return redirect()->route('notifications-patient');
//     }

//     abort(403);
// })->name('notifications');

// Route::middleware('auth')->group(function () {
//     Route::resource('appointments', AppointmentController::class);
// });

// //     Route::get('/', function () {
// //     if (!auth()->check()) {
// //         return redirect()->route('patient.dashboard');
// //     }

// //     if (auth()->user()->role === 'doctor') {
// //         return redirect()->route('doctor.dashboard');
// //     }

// //     return redirect()->route('patient.dashboard'); // patient
// // });

