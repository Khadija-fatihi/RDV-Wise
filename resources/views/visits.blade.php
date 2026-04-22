@extends('layouts.app')

@section('title', 'My Visits - RDV Wise')

@section('content')

<main class="max-w-7xl mx-auto px-4 md:px-6 py-8">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-on-background tracking-tight mb-2">Lab Results &amp; Reports</h1>
            <p class="text-on-surface-variant max-w-2xl">Access and analyze your clinical data. Your most recent findings were uploaded on Oct 24, 2023.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="flex items-center bg-white border border-outline-variant px-3 py-2 rounded-lg shadow-sm">
                <span class="material-symbols-outlined text-outline mr-2 text-xl">calendar_today</span>
                <span class="text-sm font-medium text-on-surface">Last 6 Months</span>
            </div>
            <button class="bg-primary text-white px-5 py-2.5 rounded-lg font-semibold flex items-center gap-2 hover:bg-primary/90 transition-all shadow-md shadow-primary/20">
                <span class="material-symbols-outlined text-[20px]">cloud_download</span>
                Download All Records
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Main Content Area (8 Cols) -->
        <div class="lg:col-span-8 space-y-8">
            <!-- Recent Results Summary Card -->
            <section>
                <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-primary rounded-full"></span>
                    Recent Results
                </h3>
                <div class="bg-white border border-outline-variant rounded-xl p-6 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-3xl">lab_panel</span>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-on-surface">Comprehensive Metabolic Panel</h4>
                            <div class="flex items-center gap-3 mt-1">
                                <span class="text-sm text-on-surface-variant flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">schedule</span>
                                    Oct 24, 2023
                                </span>
                                <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold uppercase tracking-wider border border-emerald-200">
                                    Normal
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <button class="flex-1 md:flex-none border border-primary text-primary px-4 py-2 rounded-lg font-semibold text-sm hover:bg-primary/5 transition-colors">Compare Past</button>
                        <button class="flex-1 md:flex-none bg-surface-container text-on-surface px-4 py-2 rounded-lg font-semibold text-sm hover:bg-surface-container-high transition-colors flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-sm">share</span>
                            Share
                        </button>
                    </div>
                </div>
            </section>

            <!-- Detailed Findings Table -->
            <section>
                <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-secondary rounded-full"></span>
                    Detailed Findings
                </h3>
                <div class="bg-white border border-outline-variant rounded-xl overflow-hidden shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-low border-b border-outline-variant">
                                    <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-widest">Biomarker</th>
                                    <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-widest">Result</th>
                                    <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-widest">Distribution</th>
                                    <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-widest">Ref. Range</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/30">
                                <tr>
                                    <td class="px-6 py-5">
                                        <p class="font-bold text-on-surface">Glucose, Serum</p>
                                        <p class="text-xs text-on-surface-variant">Metabolic health marker</p>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="text-lg font-black text-on-surface">92</span>
                                        <span class="text-xs text-on-surface-variant ml-1">mg/dL</span>
                                    </td>
                                    <td class="px-6 py-5 min-w-[200px]">
                                        <div class="h-2 w-full bg-surface-container rounded-full relative overflow-hidden">
                                            <div class="absolute inset-y-0 left-[20%] right-[20%] bg-emerald-100 border-x border-emerald-200"></div>
                                            <div class="absolute h-4 w-1 bg-primary -top-1 left-[45%] rounded-full shadow-sm"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="text-sm font-medium text-on-surface">65 - 99</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-5">
                                        <p class="font-bold text-on-surface">Calcium, Serum</p>
                                        <p class="text-xs text-on-surface-variant">Bone &amp; Nerve function</p>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="text-lg font-black text-tertiary">9.8</span>
                                        <span class="text-xs text-on-surface-variant ml-1">mg/dL</span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="h-2 w-full bg-surface-container rounded-full relative overflow-hidden">
                                            <div class="absolute inset-y-0 left-[25%] right-[25%] bg-emerald-100 border-x border-emerald-200"></div>
                                            <div class="absolute h-4 w-1 bg-primary -top-1 left-[65%] rounded-full shadow-sm"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="text-sm font-medium text-on-surface">8.7 - 10.2</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-5">
                                        <p class="font-bold text-on-surface">Sodium, Serum</p>
                                        <p class="text-xs text-on-surface-variant">Electrolyte balance</p>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="text-lg font-black text-on-surface">140</span>
                                        <span class="text-xs text-on-surface-variant ml-1">mmol/L</span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="h-2 w-full bg-surface-container rounded-full relative overflow-hidden">
                                            <div class="absolute inset-y-0 left-[15%] right-[15%] bg-emerald-100 border-x border-emerald-200"></div>
                                            <div class="absolute h-4 w-1 bg-primary -top-1 left-[50%] rounded-full shadow-sm"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="text-sm font-medium text-on-surface">134 - 144</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Physician's Comments -->
            <section class="bg-primary/5 border border-primary/20 rounded-xl p-6 relative overflow-hidden">
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-8xl text-primary/10 rotate-12 pointer-events-none">chat_bubble</span>
                <div class="flex items-start gap-4">
                    <img alt="Dr. Sarah Johnson Profile" class="w-12 h-12 rounded-full border-2 border-white shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCR0zyW7PxAJXCuaMdEe73F9KJ6UN59YYZsIT_sWPSDGiSRFht3YiwzWld8Wi6n5-i-K3fj4jAn7nLz0PyFk1Vgj1_p3HZgIWLYbRvnVWma4FlfBby3thPhYOb4F9V5C2xYsedWGIbizf1i2BKpp8hveoSz00qCF9i8oL4DYtnkB2n-lBNvqR55-5PVnZzHJOxPOETFAn3X1Z38OL1Q01cVJbDTRKADIcCAO8jI-DAHKTmrfeRpNykQTthnuDudc2l5D0lLcj2qK_s">
                    <div>
                        <h4 class="font-bold text-on-surface">Physician's Comments</h4>
                        <p class="text-sm text-primary font-semibold mb-2">Dr. Sarah Johnson, MD • Primary Care</p>
                        <p class="text-on-surface leading-relaxed italic">
                            "Your metabolic panel results look excellent and well within the target ranges. The glucose levels indicate great glycemic control. Continue with your current hydration and nutritional plan."
                        </p>
                    </div>
                </div>
            </section>

            <!-- Imaging Reports -->
            <section>
                <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-tertiary rounded-full"></span>
                    Imaging Reports
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white border border-outline-variant rounded-xl p-4 flex gap-4 hover:shadow-md transition-shadow">
                        <div class="w-24 h-24 bg-black rounded-lg overflow-hidden shrink-0 flex items-center justify-center border border-outline-variant">
                            <img class="opacity-60 hover:opacity-100 transition-opacity w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAqHld8P7-lKZTqlVFZq9oPYVNX8f6f2aTxswU2fvQKD3mlHX5HgXhHZQ-e8tNmLgSfFYlFuh0T3Z4xToPaGycAvObTCNUiqMZrM8tJVvS2VIdIWk0lSMpM25p5r7e3LH3rDBGlW9ZaEtLpuqdz2xGPZSGXJBXYPSVxG_XNBv8dzhpooIgGYQQcd6X2-hclWa9kC6HPkFVmhQuf3Vukg4n3bxl27Gj8FJLnhjFrUi3diCaDqe78b3duxH2JJO-iTiwjTF7U7y2gE04" alt="Chest X-Ray">
                        </div>
                        <div class="flex flex-col justify-between py-1">
                            <div>
                                <h5 class="font-bold text-on-surface">Chest X-Ray (2 Views)</h5>
                                <p class="text-xs text-on-surface-variant">Uploaded Sep 12, 2023</p>
                            </div>
                            <button class="text-primary text-sm font-bold flex items-center gap-1 hover:underline">
                                View Full Report
                                <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                    <div class="bg-white border border-outline-variant rounded-xl p-4 flex gap-4 hover:shadow-md transition-shadow">
                        <div class="w-24 h-24 bg-slate-900 rounded-lg overflow-hidden shrink-0 flex items-center justify-center border border-outline-variant">
                            <img class="opacity-60 hover:opacity-100 transition-opacity w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCTTuBFdm-KF31iMnAT7XQwJGiOxI2HAmrZwMy4xouWslOZ6yWcRCVaZdxoLjPy-v30E9kFAmJOFsk0qXUSRDKbssZ0fBmJLr-Uv0l0I2dGH3quhKGA-0rQlq-fy6bF2JuF23xH0Yl5NqRCBFSgGb7D63xf5U-r-3T_-El9TA3JwXml4qp3gqLg4-6KRhgLQ4VosVgXpKyfIOLYtX4tQs3JLzl0F8TVTzD8RCbOkWL1dnO9qLLb2tqqqThNr3H8XKsHB6VlnQAVOo" alt="Brain MRI">
                        </div>
                        <div class="flex flex-col justify-between py-1">
                            <div>
                                <h5 class="font-bold text-on-surface">Brain MRI (No Contrast)</h5>
                                <p class="text-xs text-on-surface-variant">Uploaded Aug 05, 2023</p>
                            </div>
                            <button class="text-primary text-sm font-bold flex items-center gap-1 hover:underline">
                                View Full Report
                                <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Sidebar (4 Cols) -->
        <aside class="lg:col-span-4 space-y-6">
            <div class="bg-white border border-outline-variant rounded-xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="font-bold text-on-surface">Health Trends</h4>
                    <select class="text-xs bg-surface-container border-none rounded px-2 py-1 focus:ring-0">
                        <option>Glucose (mg/dL)</option>
                        <option>Sodium</option>
                    </select>
                </div>
                <div class="h-48 w-full relative mt-4">
                    <div class="absolute inset-0 flex items-end justify-between px-2">
                        <div class="absolute inset-0 flex flex-col justify-between pointer-events-none">
                            <div class="border-t border-slate-100 w-full h-0"></div>
                            <div class="border-t border-slate-100 w-full h-0"></div>
                            <div class="border-t border-slate-100 w-full h-0"></div>
                            <div class="border-t border-slate-100 w-full h-0"></div>
                        </div>
                        <div class="w-1.5 h-3/4 bg-primary/20 rounded-full group cursor-pointer relative">
                            <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-on-surface text-white text-[10px] py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">98</div>
                        </div>
                        <div class="w-1.5 h-[65%] bg-primary/20 rounded-full group cursor-pointer relative">
                            <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-on-surface text-white text-[10px] py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">94</div>
                        </div>
                        <div class="w-1.5 h-[70%] bg-primary/40 rounded-full group cursor-pointer relative"></div>
                        <div class="w-1.5 h-[60%] bg-primary/20 rounded-full group cursor-pointer relative"></div>
                        <div class="w-1.5 h-[80%] bg-primary rounded-full group cursor-pointer relative">
                            <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white text-[10px] py-1 px-2 rounded">92</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-4 text-[10px] font-bold text-outline uppercase tracking-tighter">
                    <span>May</span><span>Jun</span><span>Jul</span><span>Aug</span><span>Sep</span>
                </div>
                <div class="mt-6 pt-6 border-t border-outline-variant/30">
                    <p class="text-xs text-on-surface-variant leading-relaxed">
                        <span class="text-emerald-600 font-bold">↑ Healthy Stability:</span> Your results have remained within 5% of your baseline for the last 6 months.
                    </p>
                </div>
            </div>

            <div class="bg-surface-container-low rounded-xl p-6 border border-outline-variant/50">
                <h4 class="font-bold text-on-surface mb-4 flex items-center gap-2 text-sm">
                    <span class="material-symbols-outlined text-primary text-lg">info</span>
                    About Your Results
                </h4>
                <ul class="space-y-4">
                    <li class="flex gap-3">
                        <span class="material-symbols-outlined text-sm mt-1 text-outline">verified</span>
                        <div>
                            <p class="text-xs font-bold text-on-surface">Certified Laboratory</p>
                            <p class="text-[11px] text-on-surface-variant">Processed by LabCorp Diagnostics, CLIA #05D0643</p>
                        </div>
                    </li>
                    <li class="flex gap-3">
                        <span class="material-symbols-outlined text-sm mt-1 text-outline">history</span>
                        <div>
                            <p class="text-xs font-bold text-on-surface">Data Retention</p>
                            <p class="text-[11px] text-on-surface-variant">Clinical records are maintained for 7 years digitally.</p>
                        </div>
                    </li>
                </ul>
                <button class="w-full mt-6 bg-white border border-outline-variant text-on-surface py-2 rounded-lg text-xs font-bold hover:bg-white/80 transition-colors">
                    Request Raw Data (JSON/CSV)
                </button>
            </div>

            <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl p-6 text-white shadow-lg relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-20">
                    <span class="material-symbols-outlined text-6xl">medical_information</span>
                </div>
                <h4 class="font-bold text-lg mb-2 relative z-10">Need help understanding?</h4>
                <p class="text-sm text-blue-100 mb-4 relative z-10">Schedule a 15-minute consultation with a clinical specialist to review these findings.</p>
                <button class="w-full bg-white text-blue-700 py-2.5 rounded-lg font-bold text-sm hover:bg-blue-50 transition-colors relative z-10">
                    Book Consultation
                </button>
            </div>
        </aside>
    </div>
</main>

@endsection