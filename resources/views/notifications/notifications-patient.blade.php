@extends('layouts.app')

@section('title', 'Notifications - smart santé')

@section('content')
<div class="container py-4">
    <div class="row g-4 align-items-start">
        <aside class="col-12 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <h2 class="h5 fw-bold mb-3 d-flex align-items-center gap-2 text-primary">
                    <span class="material-symbols-outlined">filter_list</span>
                </h2>
                <div class="d-grid gap-2">
                   
                    <button class="btn btn-outline-secondary rounded-4 text-start">Records</button>
                </div>
            </div>

    
        </aside>

        <section class="col-12 col-lg-9 d-grid gap-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                <div>
                    <h1 class="h2 fw-bold mb-1">Notification Center</h1>
                    <p class="text-muted mb-0">Stay updated with your healthcare activities.</p>
                </div>
                <button class="btn btn-link text-primary p-0">Mark all as read</button>
            </div>

            <article class="card border-0 shadow-sm rounded-4 p-4">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-4 bg-primary bg-opacity-10 text-primary p-3"><span class="material-symbols-outlined">event_available</span></div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start gap-3 mb-2">
                            <h3 class="h5 fw-bold mb-0">Appointment Confirmed</h3>
                            <span class="badge bg-light text-muted">2h ago</span>
                        </div>
                        <p class="text-muted mb-3">Your visit with <strong class="text-dark">Dr. Sarah Johnson</strong> at Central Health Clinic has been confirmed for Tuesday, Oct 24th at 10:30 AM.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-primary rounded-4 btn-sm">View Details</button>
                            <button class="btn btn-outline-secondary rounded-4 btn-sm">Add to Calendar</button>
                        </div>
                    </div>
                </div>
            </article>

            @php
                $recordRequests = collect($notifications ?? [])->filter(fn ($notification) => ($notification->data['type'] ?? null) === 'medical_records_request')->values();
            @endphp

            @foreach ($recordRequests as $notification)
                @php
                    $data = $notification->data ?? [];
                    $status = $data['status'] ?? 'pending';
                    $doctorName = $data['doctor_name'] ?? 'Your doctor';
                    $message = $data['message'] ?? 'requested temporary access to your medical history for your upcoming consultation.';
                @endphp

                <article class="card border-0 shadow-sm rounded-4 p-4">
                    <div class="d-flex align-items-start gap-3">
                        <div class="rounded-4 bg-success bg-opacity-10 text-success p-3"><span class="material-symbols-outlined">folder_shared</span></div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start gap-3 mb-2">
                                <h3 class="h5 fw-bold mb-0">Medical Records Request</h3>
                                <span class="badge bg-light text-muted">{{ $notification->created_at?->diffForHumans() ?? 'Recently' }}</span>
                            </div>
                            <p class="text-muted mb-3"><strong class="text-dark">{{ $doctorName }}</strong> {{ $message }}</p>
                            @if ($status === 'pending')
                                <div class="d-flex flex-wrap gap-2">
                                    <form action="{{ route('record-access.response', ['id' => $notification->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="decision" value="approved">
                                        <button type="submit" class="btn btn-success rounded-4 btn-sm">Approve Access</button>
                                    </form>
                                    <form action="{{ route('record-access.response', ['id' => $notification->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="decision" value="declined">
                                        <button type="submit" class="btn btn-outline-secondary rounded-4 btn-sm">Decline</button>
                                    </form>
                                </div>
                            @else
                                <p class="text-muted mb-0">You {{ $status === 'approved' ? 'approved' : 'declined' }} this request{{ isset($data['responded_at']) ? ' on ' . \Carbon\Carbon::parse($data['responded_at'])->diffForHumans() : '' }}.</p>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach

            @if ($recordRequests->isEmpty())
                <article class="card border-0 shadow-sm rounded-4 p-4 bg-light">
                    <p class="text-muted mb-0">No record access requests are pending right now.</p>
                </article>
            @endif

            <article class="card border-0 shadow-sm rounded-4 p-4">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-4 bg-danger bg-opacity-10 text-danger p-3"><span class="material-symbols-outlined">lock_reset</span></div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start gap-3 mb-2">
                            <h3 class="h5 fw-bold mb-0">New Login Detected</h3>
                            <span class="badge bg-light text-muted">Yesterday</span>
                        </div>
                        <p class="text-muted mb-3">A new login was detected from <strong class="text-dark">Safari on MacOS</strong>. If this wasn't you, please secure your account immediately.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-danger rounded-4 btn-sm">This wasn't me</button>
                            <button class="btn btn-outline-secondary rounded-4 btn-sm">View Login Activity</button>
                        </div>
                    </div>
                </div>
            </article>

            <article class="card border-0 shadow-sm rounded-4 p-4 bg-light opacity-75">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-4 bg-secondary bg-opacity-10 text-secondary p-3"><span class="material-symbols-outlined">lab_profile</span></div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start gap-3 mb-2">
                            <h3 class="h6 fw-bold mb-0"> Results Ready</h3>
                            <span class="badge bg-white text-muted">2 days ago</span>
                        </div>
                        <p class="text-muted mb-0">Your blood work results from October 15th are now available in the portal.</p>
                    </div>
                </div>
            </article>
        </section>
    </div>
</div>
@endsection