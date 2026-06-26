@extends('layouts.app')

@section('title', 'Profile - Smart santé')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        @if (session('status'))
            <div class="alert alert-success rounded-4">{{ session('status') }}</div>
        @endif
        <p class="text-uppercase small fw-semibold text-primary mb-2">My Profile</p>
        <h1 class="h2 fw-bold mb-2">Patient Profile</h1>
        <p class="text-muted mb-0">Manage your account details, health preferences, and notification settings.</p>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-4">
            <section class="card border-0 shadow-sm rounded-4 p-4 text-center h-100">
                <div class="mx-auto mb-3 rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center" style="width: 96px; height: 96px; font-size: 2rem; font-weight: 700;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}
                </div>
                <h2 class="h4 fw-bold mb-1">{{ auth()->user()->name ?? 'Patient Name' }}</h2>
                <p class="text-muted small mb-3">Member since {{ auth()->user()->created_at?->format('M Y') ?? 'Jan 2023' }}</p>
                <div id="profileSummaryBadges" class="d-flex flex-wrap justify-content-center gap-2" role="button" tabindex="0" aria-label="Edit profile details">
                    <span class="badge bg-primary-subtle text-primary">Blood Type: {{ auth()->user()->patient->groupe_sanguin ?? 'Not set' }}</span>
                    <span class="badge bg-success-subtle text-success">Verified Identity</span>
                </div>
                <button type="button" id="editProfileBtn" class="btn btn-outline-primary rounded-4 mt-4 w-100">
                    <span class="material-symbols-outlined align-middle me-1">edit</span>
                    Edit Profile
                </button>
            </section>
        </div>

        <div class="col-12 col-lg-8 d-grid gap-4">
            <form id="profileForm" action="{{ route('profile.update') }}" method="POST" class="card border-0 shadow-sm rounded-4 p-4">
                @csrf
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="h5 fw-bold mb-0">Personal Information</h3>
                    <button type="submit" class="btn btn-primary rounded-4">
                        <span class="material-symbols-outlined align-middle me-1">save</span>
                        Save Changes
                    </button>
                </div>
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold small text-uppercase text-muted">Full Name</label>
                        <input class="form-control rounded-4" type="text" name="name" value="{{ auth()->user()->name ?? '' }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold small text-uppercase text-muted">Email Address</label>
                        <input class="form-control rounded-4" type="email" name="email" value="{{ auth()->user()->email ?? '' }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold small text-uppercase text-muted">CIN / National ID</label>
                        <input class="form-control rounded-4" type="text" name="cin" value="{{ auth()->user()->patient->cin ?? '' }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold small text-uppercase text-muted">Phone Number</label>
                        <input class="form-control rounded-4" type="tel" name="phone" value="{{ auth()->user()->phone ?? '' }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold small text-uppercase text-muted">Blood Type</label>
                        <select class="form-select rounded-4" name="groupe_sanguin">
                            <option value="" {{ empty(auth()->user()->patient->groupe_sanguin) ? 'selected' : '' }}>Select blood type</option>
                            <option value="A+" {{ (auth()->user()->patient->groupe_sanguin ?? '') === 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ (auth()->user()->patient->groupe_sanguin ?? '') === 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ (auth()->user()->patient->groupe_sanguin ?? '') === 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ (auth()->user()->patient->groupe_sanguin ?? '') === 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ (auth()->user()->patient->groupe_sanguin ?? '') === 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ (auth()->user()->patient->groupe_sanguin ?? '') === 'AB-' ? 'selected' : '' }}>AB-</option>
                            <option value="O+" {{ (auth()->user()->patient->groupe_sanguin ?? '') === 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ (auth()->user()->patient->groupe_sanguin ?? '') === 'O-' ? 'selected' : '' }}>O-</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold small text-uppercase text-muted">Organisme</label>
                        <input class="form-control rounded-4" type="text" name="organisme" value="{{ auth()->user()->patient->organisme ?? 'CNSS / AMO / CNOPS' }}">
                    </div>
                </div>
            </form>

            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <section class="card border-0 shadow-sm rounded-4 p-4 h-100">
                        <div class="d-flex align-items-center gap-2 mb-3 text-danger">
                            <span class="material-symbols-outlined">warning</span>
                            <h3 class="h6 fw-bold mb-0">Allergies</h3>
                        </div>

                        <form id="allergyForm" class="d-flex gap-2 mb-3">
                            <input id="allergyInput" class="form-control form-control-sm rounded-4" type="text" placeholder="Add an allergy (e.g. Penicillin)" aria-label="Allergy name">
                            <button type="submit" class="btn btn-outline-danger rounded-4 btn-sm">
                                <span class="material-symbols-outlined align-middle me-1">add</span>
                                Add
                            </button>
                        </form>
                        <div id="allergiesList" class="d-flex flex-wrap gap-2"></div>
                    </section>
                </div>

                <div class="col-12 col-md-6">
                    <section class="card border-0 shadow-sm rounded-4 p-4 h-100" id="conditionsCard">
                        <div class="d-flex align-items-center gap-2 mb-3 text-primary">
                            <span class="material-symbols-outlined">medical_services</span>
                            <h3 class="h6 fw-bold mb-0">Chronic Conditions</h3>
                        </div>

                        <form id="conditionForm" class="d-flex gap-2 mb-3">
                            <input id="conditionInput" class="form-control form-control-sm rounded-4" type="text" placeholder="Add a condition (e.g. Asthma)" aria-label="Condition name">
                            <button type="submit" class="btn btn-outline-primary rounded-4 btn-sm">
                                <span class="material-symbols-outlined align-middle me-1">add</span>
                                Add
                            </button>
                        </form>
                        <div id="conditionsList" class="d-flex flex-wrap gap-2"></div>
                    </section>
                </div>
            </div>

            <section class="card border-0 shadow-sm rounded-4 p-4">
                <h3 class="h5 fw-bold mb-3">Notification Preferences</h3>
                <div class="d-grid gap-3">
                    <div class="d-flex justify-content-between align-items-center border rounded-4 p-3 bg-light">
                        <div>
                            <h4 class="h6 fw-bold mb-1">Email Reminders</h4>
                            <p class="text-muted small mb-0">Receive appointment reminders in your email inbox.</p>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="email_notifications" value="1" role="switch" {{ old('email_notifications', auth()->user()->email_notifications ?? true) ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border rounded-4 p-3 bg-light">
                        <div>
                            <h4 class="h6 fw-bold mb-1">SMS Alerts</h4>
                            <p class="text-muted small mb-0">Send reminders to {{ auth()->user()->phone ?: 'your phone number' }}.</p>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="sms_notifications" value="1" role="switch" {{ old('sms_notifications', auth()->user()->sms_notifications ?? true) ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
            </section>

            <section class="card border-0 shadow-sm rounded-4 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h3 class="h5 fw-bold mb-1">Medical Records</h3>
                        <p class="text-muted mb-0">Upload your medical history so doctors can review previous reports and prescriptions.</p>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success rounded-4 mb-3">{{ session('success') }}</div>
                @endif

                <form action="{{ route('patient.records.upload') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="records" class="form-label small text-uppercase fw-semibold text-muted">Add files</label>
                        <input class="form-control rounded-4" type="file" id="records" name="records[]" multiple accept=".pdf,.jpg,.jpeg,.png">
                        @error('records')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                        @error('records.*')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary rounded-4">Upload Records</button>
                </form>

                <div class="border-top border-secondary-subtle pt-3">
                    <h4 class="h6 fw-semibold mb-3">Uploaded Files</h4>
                    @if (!empty($patientRecords) && count($patientRecords))
                        <ul class="list-group list-group-flush">
                            @foreach ($patientRecords as $file)
                                <li class="list-group-item px-0 py-2">
                                    <div class="d-flex justify-content-between align-items-center gap-2">
                                        <span>{{ $file['name'] }}</span>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('patient.record.download', ['filename' => $file['filename']]) }}" class="btn btn-outline-primary btn-sm rounded-4">Download</a>
                                            <form action="{{ route('patient.record.delete', ['filename' => $file['filename']]) }}" method="POST" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-4">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted small mb-0">No medical records uploaded yet.</p>
                    @endif
                </div>
            </section>

            <section class="card border-0 shadow-sm rounded-4 p-4 bg-light border-danger-subtle">
                <div class="d-flex justify-content-between align-items-center gap-3">
                    <div>
                        <h3 class="h6 fw-bold text-danger mb-1">Deactivate Account</h3>
                        <p class="text-muted small mb-0">Temporarily disable your profile and data.</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger rounded-4">
                            <span class="material-symbols-outlined align-middle me-1">logout</span>
                            Logout
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editProfileBtn = document.getElementById('editProfileBtn');
        const profileSummaryBadges = document.getElementById('profileSummaryBadges');
        const profileForm = document.getElementById('profileForm');

        function focusProfileForm() {
            profileForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
            const firstField = profileForm.querySelector('input[name="name"]');
            if (firstField) {
                setTimeout(function () {
                    firstField.focus();
                    firstField.select();
                }, 300);
            }
        }

        if (editProfileBtn && profileForm) {
            editProfileBtn.addEventListener('click', focusProfileForm);
        }

        if (profileSummaryBadges && profileForm) {
            profileSummaryBadges.addEventListener('click', focusProfileForm);
            profileSummaryBadges.addEventListener('keydown', function (event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    focusProfileForm();
                }
            });
        }

        function createChip(value, variant) {
            const chip = document.createElement('span');
            chip.className = variant === 'danger'
                ? 'badge rounded-pill bg-danger-subtle text-danger border border-danger-subtle d-inline-flex align-items-center gap-1 px-2 py-2'
                : 'badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle d-inline-flex align-items-center gap-1 px-2 py-2';

            chip.innerHTML = value + ' <button type="button" class="btn-close btn-close-sm" aria-label="Remove"></button>';
            chip.querySelector('button').addEventListener('click', function () {
                chip.remove();
            });

            return chip;
        }

        function initTagForm(formId, inputId, listId, variant) {
            const form = document.getElementById(formId);
            const input = document.getElementById(inputId);
            const list = document.getElementById(listId);

            if (!form || !input || !list) {
                return;
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const value = input.value.trim();

                if (!value) {
                    input.focus();
                    return;
                }

                list.appendChild(createChip(value, variant));
                input.value = '';
                input.focus();
            });
        }

        initTagForm('allergyForm', 'allergyInput', 'allergiesList', 'danger');
        initTagForm('conditionForm', 'conditionInput', 'conditionsList', 'primary');
    });
</script>
@endsection