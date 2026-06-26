@extends('layouts.app')

@section('title', 'My Visits - Smart santé')

@section('content')
<div class="container py-4">
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3 mb-4">
        <div>
            <p class="text-uppercase small fw-semibold text-primary mb-2">Lab Results</p>
            <h1 class="h2 fw-bold mb-2"> Results &amp; Reports</h1>
            <p class="text-muted mb-0">Access and analyze your clinical data. Your most recent findings were uploaded on Oct 24, 2023.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <button id="lastSixMonthsBtn" class="btn btn-outline-primary rounded-4" type="button">
                <span class="material-symbols-outlined align-middle me-1">calendar_today</span>
                Last 6 Months
            </button>
            <button id="downloadAllRecordsBtn" class="btn btn-primary rounded-4" type="button">
                <span class="material-symbols-outlined align-middle me-1">cloud_download</span>
                Download All Records
            </button>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-8 d-grid gap-4">

            <section class="card border-0 shadow-sm rounded-4 p-4">
                <h3 class="h5 fw-bold mb-3">Detailed Findings</h3>
                <div class="table-responsive rounded-4 border">
                    <table class="table table-sm align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Biomarker</th>
                                <th>Result</th>
                                <th>Distribution</th>
                                <th>Ref. Range</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Blood Sugar</strong><br><small class="text-muted">Blood glucose level</small></td>
                                <td><strong>92</strong> <small class="text-muted">mg/dL</small></td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-success" style="width: 60%"></div>
                                    </div>
                                </td>
                                <td>70 - 100</td>
                            </tr>

                            <tr>
                                <td><strong>Blood Pressure</strong><br><small class="text-muted">Cardiovascular health marker</small></td>
                                <td><strong class="text-info">120/80</strong> <small class="text-muted">mmHg</small></td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-info" style="width: 70%"></div>
                                    </div>
                                </td>
                                <td>90/60 - 120/80</td>
                            </tr>

                            <tr>
                                <td><strong>Weight</strong><br><small class="text-muted">Body weight measurement</small></td>
                                <td><strong>70</strong> <small class="text-muted">kg</small></td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-primary" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td>50 - 90</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="card border-0 shadow-sm rounded-4 p-4 bg-primary bg-opacity-10">
                <div class="d-flex align-items-start gap-3">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCR0zyW7PxAJXCuaMdEe73F9KJ6UN59YYZsIT_sWPSDGiSRFht3YiwzWld8Wi6n5-i-K3fj4jAn7nLz0PyFk1Vgj1_p3HZgIWLYbRvnVWma4FlfBby3thPhYOb4F9V5C2xYsedWGIbizf1i2BKpp8hveoSz00qCF9i8oL4DYtnkB2n-lBNvqR55-5PVnZzHJOxPOETFAn3X1Z38OL1Q01cVJbDTRKADIcCAO8jI-DAHKTmrfeRpNykQTthnuDudc2l5D0lLcj2qK_s" alt="Doctor" class="rounded-circle border border-white" width="56" height="56">
                    <div>
                        <h4 class="h6 fw-bold mb-1">Doctor's Comments</h4>
                        <p class="small text-primary fw-semibold mb-2">
                            {{ $latestAppointment?->doctor?->user?->name ?? 'Your doctor' }}
                            @if($latestAppointment?->doctor?->specialite)
                                • {{ $latestAppointment->doctor->specialite }}
                            @endif
                        </p>
                        <p class="mb-0 text-dark">
                            {{ $latestAppointment?->consultation?->notes
                                ?? $latestAppointment?->notes_medecin
                                ?? 'No doctor comment is available for your latest case yet.' }}
                        </p>
                    </div>
                </div>
            </section>

            
        </div>

        <aside class="col-12 col-lg-4 d-grid gap-4">
            <section class="card border-0 shadow-sm rounded-4 p-4">
                <h3 class="h5 fw-bold mb-3">Health Trends</h3>
                <select id="trendSelect" class="form-select form-select-sm w-auto mb-3">
                    <option value="blood-sugar">Blood Sugar</option>
                    <option value="blood-pressure">Blood Pressure</option>
                    <option value="weight">Weight</option>
                </select>
                <div class="bg-light rounded-4 p-3">
                    <div id="trendBars" class="d-flex align-items-end gap-2" style="height: 150px;">
                        <div class="trend-bar bg-primary bg-opacity-25 rounded-top" style="width: 14px; height: 75%"></div>
                        <div class="trend-bar bg-primary bg-opacity-25 rounded-top" style="width: 14px; height: 65%"></div>
                        <div class="trend-bar bg-primary bg-opacity-50 rounded-top" style="width: 14px; height: 70%"></div>
                        <div class="trend-bar bg-primary bg-opacity-25 rounded-top" style="width: 14px; height: 60%"></div>
                        <div class="trend-bar bg-primary rounded-top" style="width: 14px; height: 80%"></div>
                    </div>
                    <div class="d-flex justify-content-between small text-muted mt-2">
                        <span>May</span><span>Jun</span><span>Jul</span><span>Aug</span><span>Sep</span>
                    </div>
                </div>
                <div class="mt-3 small text-muted">
                    <p class="mb-2"><strong class="text-success">Current snapshot</strong></p>
                    <ul class="list-unstyled d-grid gap-2 mb-0">
                        <li id="trendSummaryBloodSugar"><span class="badge bg-success-subtle text-success me-2">Blood Sugar</span> 92 mg/dL · 70 - 100</li>
                        <li id="trendSummaryBloodPressure"><span class="badge bg-info-subtle text-info me-2">Blood Pressure</span> 120/80 mmHg · 90/60 - 120/80</li>
                        <li id="trendSummaryWeight"><span class="badge bg-primary-subtle text-primary me-2">Weight</span> 70 kg · 50 - 90</li>
                    </ul>
                </div>
            </section>

            <section class="card border-0 shadow-sm rounded-4 p-4 bg-light">
                <h3 class="h6 fw-bold mb-3">About Your Results</h3>
                <ul class="list-unstyled d-grid gap-3 mb-0">
                    <li class="d-flex gap-2"><span class="material-symbols-outlined text-primary">verified</span><div><strong class="small">Certified Laboratory</strong><br><small class="text-muted">Processed by LabCorp Diagnostics, CLIA #05D0643</small></div></li>
                    <li class="d-flex gap-2"><span class="material-symbols-outlined text-primary">history</span><div><strong class="small">Data Retention</strong><br><small class="text-muted">Clinical records are maintained for 7 years digitally.</small></div></li>
                </ul>
                <button class="btn btn-outline-secondary w-100 mt-3">Request Raw Data (JSON/CSV)</button>
            </section>

            
        </aside>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('trendSelect');
        const bars = Array.from(document.querySelectorAll('#trendBars .trend-bar'));
        const downloadBtn = document.getElementById('downloadAllRecordsBtn');
        const sixMonthsBtn = document.getElementById('lastSixMonthsBtn');
        const comparePastBtn = document.getElementById('comparePastBtn');
        const shareResultsBtn = document.getElementById('shareResultsBtn');
        const summaries = {
            'blood-sugar': {
                color: 'bg-success',
                heights: ['75%', '65%', '70%', '60%', '80%'],
                opacity: ['bg-opacity-25', 'bg-opacity-25', 'bg-opacity-50', 'bg-opacity-25', ''],
                text: '92 mg/dL · 70 - 100'
            },
            'blood-pressure': {
                color: 'bg-info',
                heights: ['70%', '68%', '72%', '74%', '78%'],
                opacity: ['bg-opacity-25', 'bg-opacity-25', 'bg-opacity-50', 'bg-opacity-25', ''],
                text: '120/80 mmHg · 90/60 - 120/80'
            },
            'weight': {
                color: 'bg-primary',
                heights: ['60%', '58%', '63%', '62%', '65%'],
                opacity: ['bg-opacity-25', 'bg-opacity-25', 'bg-opacity-50', 'bg-opacity-25', ''],
                text: '70 kg · 50 - 90'
            }
        };

        function updateTrend(value) {
            const data = summaries[value] || summaries['blood-sugar'];

            bars.forEach((bar, index) => {
                bar.className = 'trend-bar rounded-top ' + data.color + ' ' + (data.opacity[index] || '');
                bar.style.height = data.heights[index];
            });

            document.getElementById('trendSummaryBloodSugar').innerHTML = '<span class="badge bg-success-subtle text-success me-2">Blood Sugar</span> ' + (value === 'blood-sugar' ? data.text : '92 mg/dL · 70 - 100');
            document.getElementById('trendSummaryBloodPressure').innerHTML = '<span class="badge bg-info-subtle text-info me-2">Blood Pressure</span> ' + (value === 'blood-pressure' ? data.text : '120/80 mmHg · 90/60 - 120/80');
            document.getElementById('trendSummaryWeight').innerHTML = '<span class="badge bg-primary-subtle text-primary me-2">Weight</span> ' + (value === 'weight' ? data.text : '70 kg · 50 - 90');
        }

        if (select) {
            select.addEventListener('change', function (event) {
                updateTrend(event.target.value);
            });
            updateTrend(select.value);
        }

        function downloadCsv(filename, records) {
            const csv = records.map(row => row.map(value => '"' + String(value).replace(/"/g, '""') + '"').join(',')).join('\n');
            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = filename;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
        }

        if (downloadBtn) {
            downloadBtn.addEventListener('click', function () {
                downloadCsv('lab-results-export.csv', [
                    ['Date', 'Biomarker', 'Result', 'Reference Range'],
                    ['Oct 24, 2023', 'Blood Sugar', '92 mg/dL', '70 - 100'],
                    ['Oct 24, 2023', 'Blood Pressure', '120/80 mmHg', '90/60 - 120/80'],
                    ['Oct 24, 2023', 'Weight', '70 kg', '50 - 90']
                ]);
            });
        }

        if (sixMonthsBtn) {
            sixMonthsBtn.addEventListener('click', function () {
                downloadCsv('lab-results-last-6-months.csv', [
                    ['Date Range', 'Biomarker', 'Result', 'Reference Range'],
                    ['May - Oct 2023', 'Blood Sugar', '92 mg/dL', '70 - 100'],
                    ['May - Oct 2023', 'Blood Pressure', '120/80 mmHg', '90/60 - 120/80'],
                    ['May - Oct 2023', 'Weight', '70 kg', '50 - 90']
                ]);
            });
        }

        if (comparePastBtn) {
            comparePastBtn.addEventListener('click', function () {
                const current = new Date().toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
                alert('Comparison view prepared for ' + current + '.');
            });
        }

        if (shareResultsBtn) {
            shareResultsBtn.addEventListener('click', function () {
                if (navigator.share) {
                    navigator.share({
                        title: 'Lab Results & Reports',
                        text: 'Here are my recent lab results from Smart santé.',
                        url: window.location.href
                    }).catch(function () {});
                } else {
                    alert('Sharing is not available in this browser.');
                }
            });
        }
    });
</script>
@endsection