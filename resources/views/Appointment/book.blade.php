@extends('layouts.app')

@section('title', 'Book Appointment - RDV Wise')

@section('content')

@if(session('success'))
    <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
        {{ session('error') }}
    </div>
@endif

<div class="pt-4 pb-32 px-0">
    <!-- Header & Action Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-on-surface tracking-tight font-headline">My Appointments</h1>
            <p class="text-on-surface-variant mt-1">Manage and track your medical consultations</p>
        </div>
        <button class="bg-primary hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl flex items-center justify-center gap-2 transition-all active:scale-95 shadow-lg shadow-blue-200/50">
            <span class="material-symbols-outlined">calendar_add_on</span>
            Book New Appointment
        </button>
    </div>

    <!-- Notification Banner -->
    <div class="mb-8 p-4 bg-blue-50 border border-blue-100 rounded-xl flex items-center gap-3">
        <span class="material-symbols-outlined text-blue-600" style="font-variation-settings: 'FILL' 1;">info</span>
        <p class="text-blue-800 font-medium">You have 2 upcoming appointments this week</p>
    </div>

    <!-- Stats Bento Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-surface-container-highest">
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 mb-3">
                <span class="material-symbols-outlined">event</span>
            </div>
            <p class="text-slate-500 text-sm font-medium">Total</p>
            <h3 class="text-2xl font-bold font-headline">24</h3>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-surface-container-highest">
            <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600 mb-3">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">upcoming</span>
            </div>
            <p class="text-slate-500 text-sm font-medium">Upcoming</p>
            <h3 class="text-2xl font-bold font-headline">2</h3>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-surface-container-highest">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 mb-3">
                <span class="material-symbols-outlined">task_alt</span>
            </div>
            <p class="text-slate-500 text-sm font-medium">Completed</p>
            <h3 class="text-2xl font-bold font-headline">18</h3>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-surface-container-highest">
            <div class="w-10 h-10 rounded-xl bg-rose-50 flex items-center justify-center text-rose-600 mb-3">
                <span class="material-symbols-outlined">cancel</span>
            </div>
            <p class="text-slate-500 text-sm font-medium">Canceled</p>
            <h3 class="text-2xl font-bold font-headline">4</h3>
        </div>
    </div>

    <!-- Appointments List -->
    <div class="bg-white rounded-2xl shadow-sm border border-surface-container-highest overflow-hidden">
        <div class="p-6 border-b border-surface-container-highest flex items-center justify-between">
            <h2 class="text-lg font-bold font-headline">Upcoming &amp; Recent</h2>
            <div class="flex gap-2">
                <button class="text-xs font-semibold px-3 py-1.5 bg-slate-100 text-slate-700 rounded-lg">All</button>
                <button class="text-xs font-semibold px-3 py-1.5 text-slate-500 hover:bg-slate-50 rounded-lg transition-colors">Upcoming</button>
                <button class="text-xs font-semibold px-3 py-1.5 text-slate-500 hover:bg-slate-50 rounded-lg transition-colors">Past</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50 text-slate-500 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Doctor</th>
                        <th class="px-6 py-4 font-semibold">Date &amp; Time</th>
                        <th class="px-6 py-4 font-semibold">Reason</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container-highest">
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="relative w-10 h-10">
                                    <img alt="Dr. Sarah Johnson" class="rounded-full w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuVEpRinZn4gMldDXTE-e_0iqzgUEcyfQTYOMl8MSgXzpLmEUNvirTJx9daa9utu8mMBCrCgr-aBVb16UozEZCBnjRQieAzmsWR9Xx8mAWgMTBOkjKVzO7xrN_T3IXYFMQh9zjjxtMyfQecMMf5lpZZwgHHQ791zKeNUnEBlA9wSd9FxjxJutg0zWj8trsNbZxX-ddDhnh13dA8ARlCc9f4E8C2mdifHaKoElpWatNNyStZXCPro2SSYbm1tBRDsVyT8cm0qkseJw"/>
                                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full"></div>
                                </div>
                                <div>
                                    <p class="font-bold text-sm">Dr. Sarah Johnson</p>
                                    <p class="text-xs text-slate-500">Cardiology</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-semibold">Oct 24, 2023</p>
                            <p class="text-xs text-slate-500">09:30 AM</p>
                        </td>
                        <td class="px-6 py-5"><p class="text-sm">Cardiology Consult</p></td>
                        <td class="px-6 py-5">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Confirmed</span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                                    <span class="material-symbols-outlined text-xl">edit</span>
                                </button>
                                <button class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all">
                                    <span class="material-symbols-outlined text-xl">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="relative w-10 h-10">
                                    <img alt="Dr. Michael Chen" class="rounded-full w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQBGjGMVDXLImsBpLmDlj0283rLvDM7_1YdIKpMDxPe9amSrhPjdwe0-L-5SDJe6LuDm0HpDqD3erIY9FJ34Olzkj4FgOol5XLFE0E4YLaiTkeOA9zxporZOQhwJvenZwaygUw8-YqPS54RY-TBWLWbEtdAIb5fJpVzchDEAgJbrIRwtLEikchIUbtw2l7jEzUavph5TbRy7XLmlBUQKCIXbZlbyJgVnvth-41qyI_NsZ0khKXkpWp0EnS4dxYCQDclC6mO3_gJ9U"/>
                                </div>
                                <div>
                                    <p class="font-bold text-sm">Dr. Michael Chen</p>
                                    <p class="text-xs text-slate-500">General Practice</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-semibold">Oct 27, 2023</p>
                            <p class="text-xs text-slate-500">02:15 PM</p>
                        </td>
                        <td class="px-6 py-5"><p class="text-sm">Routine Checkup</p></td>
                        <td class="px-6 py-5">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Confirmed</span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                                    <span class="material-symbols-outlined text-xl">edit</span>
                                </button>
                                <button class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all">
                                    <span class="material-symbols-outlined text-xl">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-6 bg-slate-50/50 border-t border-surface-container-highest flex items-center justify-between text-sm text-slate-500">
            <p>Showing 1-4 of 24 appointments</p>
            <div class="flex gap-4">
                <button class="hover:text-blue-600 font-medium disabled:opacity-30" disabled>Previous</button>
                <button class="hover:text-blue-600 font-medium">Next</button>
            </div>
        </div>
    </div>
</div>

@endsection