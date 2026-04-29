@extends('layouts.app')

@section('title', 'Doctor Dashboard - RDV Wise')

@section('content')
        <h1 class="text-2xl font-bold">Welcome , Dr. {{ auth()->user()->name ?? 'Doctor' }} 👨‍⚕️</h1>

<main class="pt-24 pb-32 px-6 max-w-5xl mx-auto">
  
<!-- Dashboard Stats Bento Grid -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
<div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_32px_rgba(0,74,198,0.06)] flex flex-col gap-4 border-l-4 border-primary">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant font-medium text-sm">Total Patients</span>
<span class="material-symbols-outlined text-primary text-3xl">group</span>
</div>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-extrabold font-headline text-primary">24</span>
<span class="text-secondary text-xs font-semibold">+3 today</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_32px_rgba(0,74,198,0.06)] flex flex-col gap-4 border-l-4 border-emerald-500">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant font-medium text-sm">Completed</span>
<span class="material-symbols-outlined text-emerald-500 text-3xl">check_circle</span>
</div>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-extrabold font-headline text-secondary">08</span>
<span class="text-on-surface-variant text-xs font-medium">Appointments</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_32px_rgba(0,74,198,0.06)] flex flex-col gap-4 border-l-4 border-secondary">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant font-medium text-sm">Remaining</span>
<span class="material-symbols-outlined text-secondary text-3xl">pending_actions</span>
</div>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-extrabold font-headline text-tertiary">16</span>
<span class="text-on-surface-variant text-xs font-medium">to attend</span>
</div>
</div>
</section>
<!-- Date Picker Header -->
<section class="mb-8 overflow-x-auto no-scrollbar">
<div class="flex items-center justify-between mb-4">
<h2 class="text-xl font-bold font-headline tracking-tight flex items-center gap-2">
<span class="material-symbols-outlined text-primary">schedule</span>
Today's Schedule
</h2>
<div class="flex gap-2">
<button class="material-symbols-outlined p-2 text-primary hover:bg-primary/10 rounded-full transition-all">chevron_left</button>
<button class="material-symbols-outlined p-2 text-primary hover:bg-primary/10 rounded-full transition-all">chevron_right</button>
</div>
</div>
<div class="flex gap-4 pb-2">
<div class="flex-shrink-0 flex flex-col items-center justify-center w-14 h-20 rounded-xl bg-surface-container-low text-on-surface-variant transition-all hover:bg-surface-container-high cursor-pointer">
<span class="text-xs font-medium">Mon</span>
<span class="text-lg font-bold">12</span>
</div>
<div class="flex-shrink-0 flex flex-col items-center justify-center w-14 h-20 rounded-xl bg-surface-container-low text-on-surface-variant transition-all hover:bg-surface-container-high cursor-pointer">
<span class="text-xs font-medium">Tue</span>
<span class="text-lg font-bold">13</span>
</div>
<div class="flex-shrink-0 flex flex-col items-center justify-center w-14 h-20 rounded-xl bg-primary-container text-white shadow-lg shadow-primary/20 scale-105">
<span class="text-xs font-medium opacity-90">Wed</span>
<span class="text-lg font-bold">14</span>
</div>
<div class="flex-shrink-0 flex flex-col items-center justify-center w-14 h-20 rounded-xl bg-surface-container-low text-on-surface-variant transition-all hover:bg-surface-container-high cursor-pointer">
<span class="text-xs font-medium">Thu</span>
<span class="text-lg font-bold">15</span>
</div>
<div class="flex-shrink-0 flex flex-col items-center justify-center w-14 h-20 rounded-xl bg-surface-container-low text-on-surface-variant transition-all hover:bg-surface-container-high cursor-pointer">
<span class="text-xs font-medium">Fri</span>
<span class="text-lg font-bold">16</span>
</div>
<div class="flex-shrink-0 flex flex-col items-center justify-center w-14 h-20 rounded-xl bg-surface-container-low text-on-surface-variant transition-all hover:bg-surface-container-high cursor-pointer">
<span class="text-xs font-medium">Sat</span>
<span class="text-lg font-bold">17</span>
</div>
</div>
</section>
<!-- Timeline -->
<section class="space-y-6">
<!-- 09:00 AM -->
<div class="flex gap-6">
<div class="w-16 flex-shrink-0 pt-4 text-right">
<span class="text-sm font-bold text-on-surface-variant">09:00</span>
<div class="text-[10px] text-slate-400 font-medium uppercase tracking-wider">AM</div>
</div>
<div class="flex-grow bg-surface-container-lowest p-6 rounded-2xl shadow-[0_12px_32px_rgba(0,74,198,0.04)] relative overflow-hidden group">
<div class="absolute top-0 left-0 w-1.5 h-full bg-secondary"></div>
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-full overflow-hidden border-2 border-surface">
</div>
<div>
<h3 class="text-lg font-bold font-headline leading-tight">Arthur youssef</h3>
<div class="flex gap-2 mt-1">
<span class="px-2 py-0.5 rounded-full bg-secondary/10 text-secondary text-[10px] font-bold uppercase tracking-tight">Follow-up</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant text-[10px] font-bold uppercase tracking-tight">Hypertension</span>
</div>
</div>
</div>
<div class="flex items-center gap-2">
<button class="px-4 py-2 rounded-lg bg-surface-container-low text-on-surface-variant text-sm font-semibold hover:bg-surface-container-high transition-all">Cancel</button>
<button class="px-4 py-2 rounded-lg bg-secondary/10 text-secondary text-sm font-semibold hover:bg-secondary/20 transition-all">Confirm</button>
<a href="{{ route('consultation.workspace') }}" class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-gradient-to-br from-primary to-primary-container text-white text-sm font-bold shadow-md shadow-primary/20 hover:scale-[1.02] transition-all">
<span class="material-symbols-outlined">medical_information</span>
Start Consultation
</a>
</div>
</div>
</div>
</div>
<!-- 10:30 AM -->
<div class="flex gap-6">
<div class="w-16 flex-shrink-0 pt-4 text-right">
<span class="text-sm font-bold text-on-surface-variant">10:30</span>
<div class="text-[10px] text-slate-400 font-medium uppercase tracking-wider">AM</div>
</div>
<div class="flex-grow bg-surface-container-lowest p-6 rounded-2xl shadow-[0_12px_32px_rgba(0,74,198,0.04)] relative overflow-hidden group border-2 border-transparent border-primary/5">
<div class="absolute top-0 left-0 w-1.5 h-full bg-primary"></div>
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-full overflow-hidden border-2 border-surface">
</div>
<div>
<h3 class="text-lg font-bold font-headline leading-tight">ouafy khadija</h3>
<div class="flex gap-2 mt-1">
<span class="px-2 py-0.5 rounded-full bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-tight">New Patient</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant text-[10px] font-bold uppercase tracking-tight">Initial Screening</span>
</div>
</div>
</div>
<div class="flex items-center gap-2 opacity-50 pointer-events-none">
<span class="text-xs font-medium text-on-surface-variant">Confirmed by Patient</span>
<a href="{{ route('consultation.workspace') }}" class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-gradient-to-br from-primary to-primary-container text-white text-sm font-bold shadow-md shadow-primary/20 hover:scale-[1.02] transition-all">
                                <span class="material-symbols-outlined">medical_information</span>
                                Start Consultation
                            </a>
</div>
</div>
</div>
</div>
<!-- Break Time -->
<div class="flex gap-6 py-4">
<div class="w-16 flex-shrink-0 text-right">
<span class="text-xs font-bold text-slate-400">12:00</span>
</div>
<div class="flex-grow flex items-center gap-4">
<div class="h-[1px] flex-grow bg-outline-variant opacity-30"></div>
<span class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em]">Lunch Break</span>
<div class="h-[1px] flex-grow bg-outline-variant opacity-30"></div>
</div>
</div>
<!-- 02:00 PM -->
<div class="flex gap-6">
<div class="w-16 flex-shrink-0 pt-4 text-right">
<span class="text-sm font-bold text-on-surface-variant">02:00</span>
<div class="text-[10px] text-slate-400 font-medium uppercase tracking-wider">PM</div>
</div>
<div class="flex-grow bg-surface-container-lowest p-6 rounded-2xl shadow-[0_12px_32px_rgba(0,74,198,0.04)] relative overflow-hidden group">
<div class="absolute top-0 left-0 w-1.5 h-full bg-secondary"></div>
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-full overflow-hidden border-2 border-surface">
</div>
<div>
<h3 class="text-lg font-bold font-headline leading-tight">khadija fatihi</h3>
<div class="flex gap-2 mt-1">
<span class="px-2 py-0.5 rounded-full bg-secondary/10 text-secondary text-[10px] font-bold uppercase tracking-tight">Follow-up</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant text-[10px] font-bold uppercase tracking-tight">Post-Op Review</span>
</div>
</div>
</div>
<div class="flex items-center gap-2">
<button class="px-4 py-2 rounded-lg bg-surface-container-low text-on-surface-variant text-sm font-semibold hover:bg-surface-container-high transition-all">Cancel</button>
<a href="{{ route('consultation.workspace') }}" class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-gradient-to-br from-primary to-primary-container text-white text-sm font-bold shadow-md shadow-primary/20 hover:scale-[1.02] transition-all">
                                <span class="material-symbols-outlined">medical_information</span>
                                Start Consultation
                            </a>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- BottomNavBar -->
<nav class="fixed bottom-0 left-0 w-full flex justify-around items-center px-4 pb-6 pt-3 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl z-50 rounded-t-3xl shadow-[0_-12px_32px_rgba(0,74,198,0.06)]">
<div class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-500 px-4 py-2 hover:text-[#006a61] dark:hover:text-teal-400 transition-transform duration-200 cursor-pointer bg-[#006a61]/10 dark:bg-teal-900/30 text-[#006a61] dark:text-teal-300 rounded-2xl">
<span class="material-symbols-outlined mb-1">event_note</span>
<span class="font-medium text-[11px] font-label">Schedule</span>
</div>
<div class="flex flex-col items-center justify-center bg-[#006a61]/10 dark:bg-teal-900/30 text-[#006a61] dark:text-teal-300 rounded-2xl px-4 py-2 transition-transform duration-200 text-slate-400 dark:text-slate-500 hover:text-[#006a61] dark:hover:text-teal-400 cursor-pointer">
<span class="material-symbols-outlined mb-1">group</span>
<span class="font-medium text-[11px] font-label">Patients</span>
</div>
<div class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-500 px-4 py-2 hover:text-[#006a61] dark:hover:text-teal-400 transition-transform duration-200 cursor-pointer">
<span class="material-symbols-outlined mb-1">video_chat</span>
<span class="font-medium text-[11px] font-label">Consults</span>
</div>
<div class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-500 px-4 py-2 hover:text-[#006a61] dark:hover:text-teal-400 transition-transform duration-200 cursor-pointer">
<span class="material-symbols-outlined mb-1">person</span>
<span class="font-medium text-[11px] font-label">Profile</span>
</div>
</nav>
@endsection