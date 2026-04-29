<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\MedecinController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\AiAnalysisController;
use App\Http\Controllers\Api\StatisticsController;

/*
|----------------------------------------------------------------------
| Routes Publiques
|----------------------------------------------------------------------
*/
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login',    [AuthController::class, 'login']);
});

// Médecins publics (pour prise de RDV)
Route::get('/medecins',              [MedecinController::class, 'index']);
Route::get('/medecins/{medecin}',    [MedecinController::class, 'show']);
Route::get('/medecins/{medecin}/slots', [AppointmentController::class, 'slots']);

// Symptômes IA (public pour démo)
Route::get('/ai/symptomes', [AiAnalysisController::class, 'symptomes']);

/*
|----------------------------------------------------------------------
| Routes Authentifiées
|----------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me',      [AuthController::class, 'me']);

    // ── ADMIN ─────────────────────────────────────────────────────
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::apiResource('patients', PatientController::class);
        Route::apiResource('medecins', MedecinController::class)->except(['index','show']);
        Route::get('/stats', [StatisticsController::class, 'admin']);
    });

    // ── MÉDECIN ───────────────────────────────────────────────────
    Route::middleware('role:medecin,admin')->prefix('medecin')->group(function () {
        Route::get('/dashboard',        [MedecinController::class, 'dashboard']);
        Route::get('/rdv/today',        [AppointmentController::class, 'today']);
        Route::patch('/rdv/{appointment}/confirm', [AppointmentController::class, 'confirm']);
        Route::patch('/rdv/{appointment}/cancel',  [AppointmentController::class, 'cancel']);
        Route::apiResource('consultations', ConsultationController::class);
        Route::put('/profil', [MedecinController::class, 'update']);
    });

    // ── PATIENT ───────────────────────────────────────────────────
    Route::middleware('role:patient,admin')->prefix('patient')->group(function () {
        Route::get('/profil',          [PatientController::class, 'show']);
        Route::put('/profil',          [PatientController::class, 'update']);
        Route::get('/consultations',   [PatientController::class, 'consultations']);
        Route::post('/ai/analyze',     [AiAnalysisController::class, 'analyze']);
        Route::get('/ai/history',      [AiAnalysisController::class, 'history']);
    });

    // ── RDV (Patient + Médecin + Admin) ───────────────────────────
    Route::apiResource('appointments', AppointmentController::class)
         ->only(['index', 'store', 'show']);
    Route::patch('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel']);
});
Route::middleware('auth:sanctum')->get('/notifications', function () {
    return auth()->user()->notifications;
});