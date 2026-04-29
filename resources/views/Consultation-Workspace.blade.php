@extends('layouts.app')

@section('title', 'My Visits - RDV Wise')

@section('content')


<div class="flex items-center gap-8">
<span class="text-2xl font-bold text-blue-600 dark:text-blue-400">       </span><div class="relative flex-1 max-w-md ml-8 hidden lg:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-primary">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm" placeholder="Search patients by name, CIN..." type="text"/>
</div>
<nav class="hidden md:flex gap-6 items-center h-full gap-12 ml-4">
<a class="flex flex-col items-center gap-1 text-slate-500 hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined">calendar_today</span>
<span class="text-xs font-medium">Schedule</span>
</a>

<div class="flex flex-col items-center gap-1 bg-[#e0f2f1] text-[#00695c] px-4 py-2 rounded-2xl">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">video_chat</span>
<span class="text-xs font-bold">Consults</span>
</div>
<a class="flex flex-col items-center gap-1 text-slate-500 hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined">person</span>
<span class="text-xs font-medium">Profile</span>
</a>
</nav>
</div>
<div class="flex items-center gap-4">
<button class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
<span class="material-symbols-outlined text-slate-600 dark:text-slate-400">notifications</span>
</button>
<button class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
<span class="material-symbols-outlined text-slate-600 dark:text-slate-400">settings</span>
</button>
<img alt="Doctor profile picture" class="w-10 h-10 rounded-full border-2 border-primary-container object-cover" data-alt="Professional portrait of a male doctor in a white coat with a friendly smile, clean clinical background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqR0BEU6ezsVgG1SirLexK0cdf6v75oyeqQ5yFWc9up2YkIue9lDXhulwd8SXC4ip3kcIzjGo9SeB29h4qxpOMWdfkYQvZO0R-Eu3u_h8he2prUxXT9WzcITTA70Wu-ay84ruN4Tya4vSpYmMoUAeLBEaS9HKxO4LzLnOfSume65UTX-bnShf7ga8PBNN06XnryrQ9edRwXcnhcRP6fw5TxQ1Ary8Obt-JwaPZbUFtxqwpra7nJb4T3OsRdLeaHqQDqGj2hJ5bHag"/>
</div>
</header>
<div class="flex flex-1 overflow-hidden">
<!-- Left: SideNavBar -->
<!-- Main Content Wrapper (Shifted for Sidebar) -->
<main class="flex flex-1 overflow-hidden">
<!-- Middle Pane: Today's Consultations -->
<section class="w-80 border-r border-slate-200 bg-surface-container-low flex flex-col">
<div class="p-6 border-b border-slate-200 bg-white">
<h2 class="text-lg font-bold font-headline text-on-surface">Today's Queue</h2>
<p class="text-xs text-outline">12 consultations scheduled</p>
</div>
<div class="flex-1 overflow-y-auto p-4 space-y-3">
<!-- Waiting Item -->
<div class="p-4 bg-white rounded-xl border border-slate-200 shadow-sm cursor-pointer hover:border-primary transition-colors">
<div class="flex justify-between items-start mb-2">
<h4 class="font-bold text-sm">ouafy khadija</h4>
<span class="px-2 py-0.5 rounded-full text-[10px] bg-amber-100 text-amber-700 font-bold">Waiting</span>
</div>
<div class="flex items-center gap-2 text-xs text-outline">
<span class="material-symbols-outlined text-sm">schedule</span>
                            09:15 AM
                        </div>
</div>
<!-- In Progress Item (Active) -->
<div class="p-4 bg-primary-container text-white rounded-xl shadow-md border border-primary">
<div class="flex justify-between items-start mb-2">
<h4 class="font-bold text-sm">ismail jarshifi</h4>
<span class="px-2 py-0.5 rounded-full text-[10px] bg-white/20 text-white font-bold">In Progress</span>
</div>
<div class="flex items-center gap-2 text-xs text-white/80">
<span class="material-symbols-outlined text-sm">schedule</span>
                            10:00 AM
                        </div>
</div>
<!-- Completed Item -->
<div class="p-4 bg-slate-50 rounded-xl border border-slate-200 opacity-60">
<div class="flex justify-between items-start mb-2">
<h4 class="font-bold text-sm">khadija fatihi</h4>
<span class="px-2 py-0.5 rounded-full text-[10px] bg-emerald-100 text-emerald-700 font-bold">Completed</span>
</div>
<div class="flex items-center gap-2 text-xs text-outline">
<span class="material-symbols-outlined text-sm">schedule</span>
                            08:30 AM
                        </div>
</div>
</div>
</section>
<!-- Right Pane: Active Workspace -->
<section class="flex-1 flex flex-col overflow-y-auto bg-surface">
<!-- Patient Profile Header -->
<div class="p-8 bg-white border-b border-slate-200 flex justify-between items-center">
<div class="flex gap-6 items-center">
<img alt="Patient profile" class="w-20 h-20 rounded-2xl object-cover shadow-sm" data-alt="Close up portrait of a middle aged man with graying beard and thoughtful expression, neutral studio background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQCrkuXGpCin0lIzRykTfTvioW3h_GXgZcv_GC-CGgOgFMrZaU3whvrbqV0WsQdZAAMHqCWm1OxMlNcypv-LXAolfLyobjpR72bLZjmt4lrhHpa9ULO5wtUBvjnqmDav8i0Jvup5kWmiz5o-uxUc0PQpCEuWIHZrKnr8zO1gZ4jKQ5GftFlt5vyEk72pMEv6MRUUAOIBREUJrdDH0_JUTVkLTP0KNUa82yMj18R1s9u4R52BdgKVWYYBrc3E-FGwLdbbmIr9RRiX0"/>
<div>
<h1 class="text-3xl font-extrabold text-on-surface">ismail jarshifi</h1>
<div class="flex gap-4 mt-1 text-outline font-medium">
<span>20 years old</span>
<span class="text-slate-300">|</span>
<span>Male</span>
<span class="text-slate-300">|</span>
<span>CIN: BK209341</span>
</div>
</div>
</div>
<div class="flex gap-3">
<button class="px-4 py-2 border border-outline-variant text-on-surface font-semibold rounded-xl hover:bg-slate-50 transition-colors">View Full File</button>
</div>
</div>
<div class="p-8 space-y-8">
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Left Column: Patient Data -->
<div class="lg:col-span-2 space-y-8">
<!-- Motif & Symptoms -->
<div class="space-y-4">
<label class="text-sm font-bold text-on-surface uppercase tracking-wider flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-lg">medical_information</span>
                                    Reason for Visit / Symptoms
                                </label>
<textarea class="w-full bg-white border border-slate-200 rounded-2xl p-4 focus:ring-2 focus:ring-primary focus:border-transparent transition-all placeholder:text-slate-400" placeholder="Describe symptoms reported by patient..." rows="4"></textarea>
</div>
<!-- Diagnosis Findings -->
<div class="space-y-4">
<label class="text-sm font-bold text-on-surface uppercase tracking-wider flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-lg">edit_note</span>
                                    Diagnosis &amp; Findings
                                </label>
<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
<div class="flex gap-2 p-2 border-b border-slate-100 bg-slate-50">
<button class="p-1 hover:bg-slate-200 rounded"><span class="material-symbols-outlined text-sm">format_bold</span></button>
<button class="p-1 hover:bg-slate-200 rounded"><span class="material-symbols-outlined text-sm">format_italic</span></button>
<button class="p-1 hover:bg-slate-200 rounded"><span class="material-symbols-outlined text-sm">format_list_bulleted</span></button>
</div>
<textarea class="w-full border-none focus:ring-0 p-4" placeholder="Enter clinical observations and final diagnosis..." rows="6"></textarea>
</div>
</div>
<!-- Prescription Module -->
<div class="space-y-4">
<div class="flex justify-between items-center">
<label class="text-sm font-bold text-on-surface uppercase tracking-wider flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-lg">prescriptions</span>
                                        Prescription Module
                                    </label>
<button class="text-sm text-primary font-bold flex items-center gap-1 hover:underline">
<span class="material-symbols-outlined text-sm">add_circle</span>
                                        Add Medication
                                    </button>
</div>
<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
<table class="w-full text-left text-sm">
<thead class="bg-slate-50 border-b border-slate-100">
<tr>
<th class="px-4 py-3 font-semibold text-outline">Medication</th>
<th class="px-4 py-3 font-semibold text-outline">Dosage</th>
<th class="px-4 py-3 font-semibold text-outline">Duration</th>
<th class="px-4 py-3 font-semibold text-outline text-right">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100">
<tr>
<td class="px-4 py-4 font-medium">Amoxicillin 500mg</td>
<td class="px-4 py-4 text-slate-600">1 tablet / 3x day</td>
<td class="px-4 py-4 text-slate-600">7 days</td>
<td class="px-4 py-4 text-right">
<button class="text-error hover:bg-red-50 p-1 rounded transition-colors"><span class="material-symbols-outlined text-lg">delete</span></button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Right Column: AI & History -->
<div class="space-y-8">
<!-- AI Diagnostic Suggestion -->
<div class="p-6 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl text-white shadow-xl relative overflow-hidden group">
<div class="relative z-10">
<div class="flex items-center gap-2 mb-4">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
<span class="text-xs font-bold uppercase tracking-widest opacity-80">Smart Insight</span>
</div>
<h4 class="text-lg font-bold mb-2 leading-tight">Probable Condition: Seasonal Rhinitis</h4>
<p class="text-sm opacity-90 leading-relaxed mb-4">Based on reported nasal congestion and ocular irritation during peak pollen season.</p>
<div class="flex gap-2">
<span class="px-2 py-1 bg-white/20 rounded-lg text-[10px] font-bold">92% Confidence</span>
<span class="px-2 py-1 bg-white/20 rounded-lg text-[10px] font-bold">Specialty: ENT</span>
</div>
</div>
<span class="material-symbols-outlined absolute -bottom-4 -right-4 text-9xl opacity-10 group-hover:scale-110 transition-transform duration-500">psychology</span>
</div>
<!-- Medical History Summary -->
<div class="space-y-4">
<label class="text-sm font-bold text-on-surface uppercase tracking-wider flex items-center gap-2">
<span class="material-symbols-outlined text-slate-500 text-lg">history</span>
                                    Recent History
                                </label>
<div class="space-y-3">
<div class="p-4 bg-white border border-slate-200 rounded-2xl">
<div class="flex justify-between items-center mb-1">
<span class="text-xs font-bold text-slate-400">Oct 12, 2023</span>
<span class="text-[10px] font-bold text-blue-600 uppercase">Checkup</span>
</div>
<p class="text-sm font-semibold mb-1">General Wellness Visit</p>
<p class="text-xs text-outline line-clamp-2 italic">"Patient reports mild fatigue, BP 130/85. Recommended improved sleep hygiene..."</p>
</div>
<div class="p-4 bg-white border border-slate-200 rounded-2xl opacity-60">
<div class="flex justify-between items-center mb-1">
<span class="text-xs font-bold text-slate-400">May 05, 2023</span>
<span class="text-[10px] font-bold text-red-600 uppercase">Urgent</span>
</div>
<p class="text-sm font-semibold mb-1">Sprained Ankle (Grade 2)</p>
<p class="text-xs text-outline line-clamp-2 italic">"Left lateral ankle swelling. X-ray negative for fracture..."</p>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Footer Actions -->
<div class="mt-auto p-8 bg-white border-t border-slate-200 flex justify-between items-center sticky bottom-0 z-20 shadow-[-10px_0_20px_rgba(0,0,0,0.05)]">
<button class="flex items-center gap-2 px-6 py-3 border border-slate-200 text-on-surface font-bold rounded-xl hover:bg-slate-50 transition-colors">
<span class="material-symbols-outlined">save</span>
                        Save Consultation
                    </button>
<div class="flex gap-4">
<button class="flex items-center gap-2 px-6 py-3 bg-secondary-container text-on-secondary-container font-bold rounded-xl hover:brightness-95 transition-all">
<span class="material-symbols-outlined">picture_as_pdf</span>
                            Generate Prescription PDF
                        </button>
<button class="flex items-center gap-2 px-8 py-3 bg-primary text-white font-bold rounded-xl shadow-lg shadow-blue-200 hover:scale-[1.02] transition-all">
<span class="material-symbols-outlined">check_circle</span>
                            Complete Consultation
                        </button>
</div>
</div>
</section>
</main>
</div>
@endsection