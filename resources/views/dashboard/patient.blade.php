@extends('layouts.app')

@section('title', 'Patient Dashboard - Smarte Santé')

@section('content')

<div class="container-fluid py-3">

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-3 bg-primary text-white">
        <div class="card-body p-3 p-md-4">
            <p class="text-uppercase small fw-semibold mb-2 text-white-50">Patient overview</p>
            <h1 class="display-6 fw-bold mb-2">Welcome back , {{ auth()->user()->name }}</h1>
            <p class="mb-0 text-white-50">Manage your appointments, visits, and care updates in one place.</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4 p-md-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
                <div>
                    <h2 class="h4 fw-bold mb-2 text-primary">
                        <span class="material-symbols-outlined me-2">medical_services</span>
                        Search a Doctor
                    </h2>
                    <p class="text-muted mb-0">Filter by city and specialty to find the right doctor and book your appointment.</p>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-3 align-items-end">
                <div class="col">
                    <label for="doctor-city" class="form-label small text-uppercase fw-semibold text-muted">City</label>
                    <select id="doctor-city" class="form-select shadow-sm">
                        <option value="">Choose a city</option>
                        @foreach($cities as $city)
                            <option value="{{ $city }}">{{ $city }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="doctor-specialty" class="form-label small text-uppercase fw-semibold text-muted">Specialty</label>
                    <select id="doctor-specialty" class="form-select shadow-sm">
                        <option value="">Choose a specialty</option>
                        @foreach($specialties as $specialty)
                            <option value="{{ $specialty }}">{{ $specialty }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col d-grid">
                    <button id="doctor-search-btn" class="btn btn-primary btn-lg">Search Doctors</button>
                </div>
            </div>

            <div id="doctor-search-loading" class="d-none align-items-center gap-2 mt-4">
                <div class="spinner-border text-primary" role="status" aria-hidden="true"></div>
                <span class="text-muted">Searching doctors...</span>
            </div>

            <div id="doctor-search-empty" class="alert alert-warning d-none mt-4" role="alert" aria-live="polite">
                Select a city and specialty to find matching doctors.
            </div>

            <div id="doctor-search-results" class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 mt-4"></div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
        <div class="col">
            <div class="card border-0 shadow-sm rounded-4 h-100 border-start border-primary border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start gap-3">
                        <div>
                            <p class="text-muted text-uppercase small fw-semibold mb-2">Total Appointments</p>
                            <h2 class="fw-bold text-primary mb-0">{{ $totalAppointments ?? 0 }}</h2>
                        </div>
                        <span class="material-symbols-outlined fs-1 text-primary-emphasis">calendar_month</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 shadow-sm rounded-4 h-100 border-start border-success border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start gap-3">
                        <div>
                            <p class="text-muted text-uppercase small fw-semibold mb-2">Upcoming</p>
                            <h2 class="fw-bold text-success mb-0">{{ $upcomingAppointments ?? 0 }}</h2>
                        </div>
                        <span class="material-symbols-outlined fs-1 text-success-emphasis">event_available</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 shadow-sm rounded-4 h-100 border-start border-info border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start gap-3">
                        <div>
                            <p class="text-muted text-uppercase small fw-semibold mb-2">Completed</p>
                            <h2 class="fw-bold text-info mb-0">{{ $completedAppointments ?? 0 }}</h2>
                        </div>
                        <span class="material-symbols-outlined fs-1 text-info-emphasis">check_circle</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4 p-md-5">
            <h2 class="h4 fw-bold mb-4 d-flex align-items-center gap-2 text-primary">
                <span class="material-symbols-outlined">today</span>
                Today's Appointments
            </h2>

        @if(isset($todayAppointments) && $todayAppointments->count())
            <div class="d-grid gap-3">
                @foreach($todayAppointments as $appointment)
                    <div class="d-flex justify-content-between align-items-center rounded-4 border border-primary-subtle bg-light p-3 p-md-4 shadow-sm">
                        <div class="d-flex align-items-center gap-3">
                            <span class="material-symbols-outlined fs-2 text-primary">medical_services</span>
                            <div>
                                <p class="fw-semibold mb-1">{{ $appointment->medecin->user->name ?? 'Doctor' }}</p>
                                <p class="text-muted small mb-0 d-flex align-items-center gap-1">
                                    <span class="material-symbols-outlined">schedule</span>
                                    {{ \Carbon\Carbon::parse($appointment->date_heure)->format('H:i') }}
                                </p>
                            </div>
                        </div>
                        <span class="badge bg-primary-subtle text-primary fw-semibold rounded-pill px-3 py-2">
                            {{ $appointment->type_seance ?? 'Consultation' }}
                        </span>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center rounded-4 border border-info-subtle bg-info-subtle p-4 p-md-5">
                <span class="material-symbols-outlined fs-1 text-info-emphasis d-block mb-2">event_busy</span>
                <p class="text-muted mb-0">No appointments scheduled for today</p>
            </div>
        @endif
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-3 mb-4">
        <div class="col">
            <a href="{{ route('book') }}" class="btn btn-primary btn-lg w-100 d-flex justify-content-center align-items-center gap-2 rounded-4 shadow-sm">
                <span class="material-symbols-outlined">add_circle</span>
                Book Appointment
            </a>
        </div>
        <div class="col">
            <a href="{{ route('visits') }}" class="btn btn-outline-secondary btn-lg w-100 d-flex justify-content-center align-items-center gap-2 rounded-4 shadow-sm">
                <span class="material-symbols-outlined">assignment</span>
                My Visits
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 bg-gradient bg-info-subtle">
        <div class="card-body p-4 p-md-5">
            <h2 class="h4 fw-bold mb-3 d-flex align-items-center gap-2 text-primary">
                <span class="material-symbols-outlined">notifications_active</span>
                Notifications
            </h2>
            <p class="text-muted mb-3">You have <span class="fw-bold text-primary">{{ $notificationsCount ?? 0 }}</span> new notifications</p>
            <a href="{{ route('notifications') }}" class="text-primary fw-semibold text-decoration-none d-inline-flex align-items-center gap-1">
                <span>View all</span>
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const citySelect = document.getElementById('doctor-city');
        const specialtySelect = document.getElementById('doctor-specialty');
        const searchButton = document.getElementById('doctor-search-btn');
        const loading = document.getElementById('doctor-search-loading');
        const resultsContainer = document.getElementById('doctor-search-results');
        const emptyNotice = document.getElementById('doctor-search-empty');

        async function searchDoctors() {
            const city = citySelect.value.trim();
            const specialty = specialtySelect.value.trim();
            resultsContainer.innerHTML = '';
            emptyNotice.classList.add('d-none');

            if (!city || !specialty) {
                emptyNotice.textContent = 'Please select both a city and a specialty before searching.';
                emptyNotice.classList.remove('d-none');
                return;
            }

            loading.classList.remove('d-none');

            try {
                const params = new URLSearchParams({ city, specialty });
                const response = await fetch(`/api/doctors?${params.toString()}`);

                if (!response.ok) {
                    throw new Error('Failed to fetch doctor results.');
                }

                const doctors = await response.json();

                if (!doctors.length) {
                    emptyNotice.textContent = `No doctors found for ${specialty} in ${city}. If the doctor is not available yet, the admin can add them from /admin/doctors.`;
                    emptyNotice.classList.remove('d-none');
                    return;
                }

                resultsContainer.innerHTML = doctors.map(renderDoctorCard).join('');
            } catch (error) {
                emptyNotice.textContent = 'Unable to load doctors at this time. Please try again later.';
                emptyNotice.classList.remove('d-none');
                console.error(error);
            } finally {
                loading.classList.add('d-none');
            }
        }

        function renderRatingStars(rating) {
            const score = Number(rating) || 0;
            const stars = [];
            const fullStars = Math.floor(score);
            const halfStar = score % 1 >= 0.5;
            for (let i = 0; i < fullStars; i++) {
                stars.push('<span class="material-symbols-outlined text-warning">star</span>');
            }
            if (halfStar) {
                stars.push('<span class="material-symbols-outlined text-warning">star_half</span>');
            }
            while (stars.length < 5) {
                stars.push('<span class="material-symbols-outlined text-muted">star_outline</span>');
            }
            return stars.join('');
        }

        function renderDoctorCard(doctor) {
            const email = doctor.email || 'N/A';
            const address = doctor.address || doctor.cabinet || 'Address unavailable';
            const bio = doctor.bio ? doctor.bio : 'Experienced medical professional available for consultation.';
            const price = doctor.price ? `${doctor.price} MAD` : 'Contact for price';
            const rating = doctor.rating ? doctor.rating.toFixed(1) : '4.5';
            const ratingStars = renderRatingStars(rating);
            return `
                <div class="col">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="${doctor.photo}" class="card-img-top rounded-top-4" alt="${doctor.name}" style="width:100%; aspect-ratio:4/3; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-2">${doctor.name}</h5>
                            <p class="text-primary fw-semibold mb-1">${doctor.specialty}</p>
                            <p class="text-muted small mb-2">${doctor.city}</p>
                            <div class="mb-3">
                                <div class="d-flex align-items-center gap-1 mb-1">
                                    ${ratingStars}
                                    <span class="small text-muted">${rating}/5</span>
                                </div>
                                <p class="mb-2"><span class="material-symbols-outlined align-middle me-1" style="font-size:18px;">attach_money</span>${price}</p>
                                <p class="mb-2"><span class="material-symbols-outlined align-middle me-1" style="font-size:18px;">location_on</span>${address}</p>
                            </div>
                            <p class="mb-2"><span class="material-symbols-outlined align-middle me-1" style="font-size:18px;">phone</span>${doctor.phone || 'N/A'}</p>
                            <p class="text-muted small mb-3">${bio}</p>
                            <div class="mt-auto">
                                <a href="{{ route('book') }}?doctor=${doctor.id}" class="btn btn-primary w-100 rounded-4">Start consultation</a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        if (searchButton) {
            searchButton.addEventListener('click', searchDoctors);
        }
    });
</script>
@endsection