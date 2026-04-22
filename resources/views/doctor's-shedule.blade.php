<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>RDV Wise - Doctor Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        theme: {
          extend: {
            "colors": {
                    "on-primary": "#002a78",
                    "surface-bright": "#363a3b",
                    "tertiary-fixed": "#c9e6ff",
                    "on-surface": "#e0e3e5",
                    "inverse-primary": "#0053db",
                    "on-tertiary-fixed-variant": "#004c6e",
                    "on-tertiary-fixed": "#001e2f",
                    "inverse-surface": "#e0e3e5",
                    "primary-container": "#2563eb",
                    "on-error": "#690005",
                    "on-error-container": "#ffdad6",
                    "surface-container-lowest": "#0b0f10",
                    "primary-fixed": "#dbe1ff",
                    "secondary": "#6bd8cb",
                    "primary": "#b4c5ff",
                    "on-primary-fixed-variant": "#003ea8",
                    "secondary-fixed": "#89f5e7",
                    "primary-fixed-dim": "#b4c5ff",
                    "secondary-fixed-dim": "#6bd8cb",
                    "on-primary-fixed": "#00174b",
                    "surface-variant": "#323537",
                    "on-tertiary-container": "#e4f2ff",
                    "tertiary-container": "#0074a6",
                    "inverse-on-surface": "#2d3133",
                    "on-primary-container": "#eeefff",
                    "tertiary-fixed-dim": "#89ceff",
                    "tertiary": "#89ceff",
                    "on-secondary": "#003732",
                    "on-secondary-fixed-variant": "#005049",
                    "on-secondary-fixed": "#00201d",
                    "on-background": "#e0e3e5",
                    "surface-container-high": "#272a2c",
                    "surface-tint": "#b4c5ff",
                    "surface-container-highest": "#323537",
                    "error": "#ffb4ab",
                    "background": "#101415",
                    "surface-container-low": "#191c1e",
                    "surface-dim": "#101415",
                    "surface-container": "#1d2022",
                    "secondary-container": "#29a195",
                    "on-secondary-container": "#00302b",
                    "outline-variant": "#434655",
                    "on-surface-variant": "#c3c6d7",
                    "error-container": "#93000a",
                    "surface": "#101415",
                    "on-tertiary": "#00344d",
                    "outline": "#8d90a0"
            },
            "borderRadius": {
                    "DEFAULT": "0.5rem",
                    "lg": "0.75rem",
                    "xl": "1rem",
                    "2xl": "1.5rem",
                    "3xl": "2rem",
                    "full": "9999px"
            },
            "fontFamily": {
                    "headline": ["Manrope"],
                    "body": ["Inter"],
                    "label": ["Inter"]
            }
          },
        },
      }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background text-on-background min-h-screen pb-32">
<!-- TopAppBar -->
<header class="fixed top-0 w-full z-50 bg-[#f7f9fb] dark:bg-slate-950 flex justify-between items-center px-6 py-4 w-full">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full overflow-hidden bg-primary-container">
<img alt="User profile photo" class="w-full h-full object-cover" data-alt="Professional male doctor with stethoscope, warm lighting, clinical background, high-end medical portrait" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0JU5XULh1y2fVlmqZBoCNiMoaYH9AJi_gmKY2NBULxTl9XYFmJy1UBHzq4w4KC0uHE4RG_WvsSS_KTANcBRfv4ON32Tin8WY5dCrpupCPovEvfpllIgxE-Ix6BUnUY55BtfkSoM1cFvyr5NAmLhOP2d9uyGENVRRo3b0HaF-yCSZGnMYUSvmR_D55hC6dO0KuHA5v1-3FQrKwsQgTtq3goR0tP57eSmobsQa-HzfhDY-wRPEUt11FIBCfgnB7d4n90efUFUaViiU"/>
</div>
<span class="text-xl font-extrabold text-[#004ac6] dark:text-blue-500">RDV Wise</span>
</div>
<div class="flex items-center gap-4">
<button class="w-10 h-10 flex items-center justify-center rounded-full text-slate-500 dark:text-slate-400 hover:bg-[#e6e8ea] dark:hover:bg-slate-800 transition-colors">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
</div>
</header>
<!-- Main Content -->
<main class="pt-24 px-6 max-w-5xl mx-auto space-y-8">
<!-- Header Section -->
<section class="space-y-2">
<h1 class="text-3xl font-bold tracking-tight text-on-background">Welcome back, Dr. Miller</h1>
<p class="text-on-surface-variant font-medium">You have 12 appointments scheduled for today.</p>
</section>
<!-- Stats Bento Grid -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-4">
<div class="bg-surface-container-low p-6 rounded-2xl border border-outline-variant/10 flex flex-col justify-between h-40">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-primary text-3xl" data-icon="group">group</span>
<span class="text-xs font-bold px-2 py-1 bg-primary/10 text-primary rounded-full uppercase tracking-wider">Total</span>
</div>
<div>
<div class="text-4xl font-extrabold text-on-surface">12</div>
<div class="text-sm text-on-surface-variant">Patients Today</div>
</div>
</div>
<div class="bg-surface-container-low p-6 rounded-2xl border border-outline-variant/10 flex flex-col justify-between h-40">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-secondary text-3xl" data-icon="task_alt">task_alt</span>
<span class="text-xs font-bold px-2 py-1 bg-secondary/10 text-secondary rounded-full uppercase tracking-wider">Completed</span>
</div>
<div>
<div class="text-4xl font-extrabold text-on-surface">08</div>
<div class="text-sm text-on-surface-variant">Consultations Done</div>
</div>
</div>
<div class="bg-surface-container-low p-6 rounded-2xl border border-outline-variant/10 flex flex-col justify-between h-40">
<div class="flex justify-between items-start">
<span class="material-symbols-outlined text-tertiary text-3xl" data-icon="pending_actions">pending_actions</span>
<span class="text-xs font-bold px-2 py-1 bg-tertiary/10 text-tertiary rounded-full uppercase tracking-wider">Remaining</span>
</div>
<div>
<div class="text-4xl font-extrabold text-on-surface">04</div>
<div class="text-sm text-on-surface-variant">Upcoming Visits</div>
</div>
</div>
</section>
<!-- Appointments List -->
<section class="space-y-4">
<div class="flex justify-between items-center">
<h2 class="text-xl font-bold text-on-surface">Today's Appointments</h2>
<button class="text-primary font-semibold text-sm flex items-center gap-1 hover:underline">
                    View Full Schedule
                    <span class="material-symbols-outlined text-sm" data-icon="arrow_forward">arrow_forward</span>
</button>
</div>
<div class="space-y-3">
<!-- Appointment Card 1 -->
<div class="bg-surface-container p-5 rounded-2xl flex flex-col md:flex-row md:items-center justify-between gap-4 border border-outline-variant/5">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-xl bg-surface-container-highest flex flex-col items-center justify-center text-on-surface">
<span class="text-xs font-bold uppercase">Oct</span>
<span class="text-lg font-black leading-none">24</span>
</div>
<div>
<h3 class="font-bold text-on-surface">Arthur McMillian</h3>
<div class="flex items-center gap-2 text-xs text-on-surface-variant">
<span class="material-symbols-outlined text-[14px]" data-icon="schedule">schedule</span>
<span>14:30 PM • General Checkup</span>
</div>
</div>
</div>
<div class="flex flex-wrap items-center gap-3">
<span class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-bold rounded-full uppercase tracking-wide">Confirmed</span>
<div class="flex gap-2">
<button class="bg-primary text-on-primary px-4 py-2 rounded-xl text-sm font-bold hover:opacity-90 active:scale-95 transition-all">
                                Start Consultation
                            </button>
<button class="w-10 h-10 flex items-center justify-center rounded-xl border border-outline-variant hover:bg-error/10 hover:text-error transition-colors">
<span class="material-symbols-outlined" data-icon="close">close</span>
</button>
</div>
</div>
</div>
<!-- Appointment Card 2 -->
<div class="bg-surface-container p-5 rounded-2xl flex flex-col md:flex-row md:items-center justify-between gap-4 border border-outline-variant/5">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-xl bg-surface-container-highest flex flex-col items-center justify-center text-on-surface">
<span class="text-xs font-bold uppercase">Oct</span>
<span class="text-lg font-black leading-none">24</span>
</div>
<div>
<h3 class="font-bold text-on-surface">Sarah Jenkins</h3>
<div class="flex items-center gap-2 text-xs text-on-surface-variant">
<span class="material-symbols-outlined text-[14px]" data-icon="schedule">schedule</span>
<span>15:15 PM • Follow-up</span>
</div>
</div>
</div>
<div class="flex flex-wrap items-center gap-3">
<span class="px-3 py-1 bg-tertiary/10 text-tertiary text-xs font-bold rounded-full uppercase tracking-wide">Pending</span>
<div class="flex gap-2">
<button class="bg-surface-container-highest text-on-surface px-4 py-2 rounded-xl text-sm font-bold hover:bg-surface-bright active:scale-95 transition-all">
                                Start Consultation
                            </button>
<button class="w-10 h-10 flex items-center justify-center rounded-xl border border-outline-variant hover:bg-error/10 hover:text-error transition-colors">
<span class="material-symbols-outlined" data-icon="close">close</span>
</button>
</div>
</div>
</div>
<!-- Appointment Card 3 -->
<div class="bg-surface-container p-5 rounded-2xl flex flex-col md:flex-row md:items-center justify-between gap-4 border border-outline-variant/5 opacity-80">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-xl bg-surface-container-highest flex flex-col items-center justify-center text-on-surface">
<span class="text-xs font-bold uppercase">Oct</span>
<span class="text-lg font-black leading-none">24</span>
</div>
<div>
<h3 class="font-bold text-on-surface">Michael Ross</h3>
<div class="flex items-center gap-2 text-xs text-on-surface-variant">
<span class="material-symbols-outlined text-[14px]" data-icon="schedule">schedule</span>
<span>16:00 PM • Lab Results</span>
</div>
</div>
</div>
<div class="flex flex-wrap items-center gap-3">
<span class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-bold rounded-full uppercase tracking-wide">Confirmed</span>
<div class="flex gap-2">
<button class="bg-surface-container-highest text-on-surface px-4 py-2 rounded-xl text-sm font-bold hover:bg-surface-bright active:scale-95 transition-all">
                                Start Consultation
                            </button>
<button class="w-10 h-10 flex items-center justify-center rounded-xl border border-outline-variant hover:bg-error/10 hover:text-error transition-colors">
<span class="material-symbols-outlined" data-icon="close">close</span>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- Insights / Asymmetric Section -->
<section class="grid grid-cols-1 lg:grid-cols-2 gap-6 pb-8">
<div class="bg-primary-container text-on-primary-container p-8 rounded-3xl relative overflow-hidden">
<div class="relative z-10 space-y-4">
<h2 class="text-2xl font-bold leading-tight">Prepare for the next<br/>AI Check consultation</h2>
<p class="text-sm opacity-80 max-w-[240px]">Sarah's medical records have been pre-analyzed by RDV Wise AI. Review the highlights before starting.</p>
<button class="bg-on-primary-container text-primary-container px-6 py-3 rounded-2xl font-bold text-sm shadow-xl hover:scale-105 transition-transform">
                        Review AI Insights
                    </button>
</div>
<div class="absolute -right-8 -bottom-8 opacity-20 transform rotate-12">
<span class="material-symbols-outlined text-[160px]" data-icon="clinical_notes">clinical_notes</span>
</div>
</div>
<div class="bg-surface-container-high p-8 rounded-3xl space-y-6">
<h3 class="text-lg font-bold">Quick Actions</h3>
<div class="grid grid-cols-2 gap-4">
<button class="flex flex-col items-center justify-center p-4 bg-surface-container-highest rounded-2xl hover:bg-surface-bright transition-colors gap-2 group">
<span class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform" data-icon="edit_calendar">edit_calendar</span>
<span class="text-xs font-medium">New Slot</span>
</button>
<button class="flex flex-col items-center justify-center p-4 bg-surface-container-highest rounded-2xl hover:bg-surface-bright transition-colors gap-2 group">
<span class="material-symbols-outlined text-secondary group-hover:scale-110 transition-transform" data-icon="mail">mail</span>
<span class="text-xs font-medium">Broadcast</span>
</button>
<button class="flex flex-col items-center justify-center p-4 bg-surface-container-highest rounded-2xl hover:bg-surface-bright transition-colors gap-2 group">
<span class="material-symbols-outlined text-tertiary group-hover:scale-110 transition-transform" data-icon="analytics">analytics</span>
<span class="text-xs font-medium">Reports</span>
</button>
<button class="flex flex-col items-center justify-center p-4 bg-surface-container-highest rounded-2xl hover:bg-surface-bright transition-colors gap-2 group">
<span class="material-symbols-outlined text-error group-hover:scale-110 transition-transform" data-icon="emergency">emergency</span>
<span class="text-xs font-medium">Urgent</span>
</button>
</div>
</div>
</section>
</main>
<!-- BottomNavBar -->
<nav class="fixed bottom-0 left-0 w-full flex justify-around items-center px-4 pb-6 pt-3 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl z-50 rounded-t-3xl shadow-[0_-12px_32px_rgba(0,74,198,0.06)]">
<a class="flex flex-col items-center justify-center bg-[#006a61]/10 dark:bg-teal-900/30 text-[#006a61] dark:text-teal-300 rounded-2xl px-4 py-2 Active: scale-95 transition-transform duration-200" href="#">
<span class="material-symbols-outlined" data-icon="event_note">event_note</span>
<span class="Inter label-md font-medium text-[11px]">Schedule</span>
</a>
<a class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-500 px-4 py-2 hover:text-[#006a61] dark:hover:text-teal-400 transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="group">group</span>
<span class="Inter label-md font-medium text-[11px]">Patients</span>
</a>
<a class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-500 px-4 py-2 hover:text-[#006a61] dark:hover:text-teal-400 transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="video_chat">video_chat</span>
<span class="Inter label-md font-medium text-[11px]">Consults</span>
</a>
<a class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-500 px-4 py-2 hover:text-[#006a61] dark:hover:text-teal-400 transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="person">person</span>
<span class="Inter label-md font-medium text-[11px]">Profile</span>
</a>
</nav>
</body></html>