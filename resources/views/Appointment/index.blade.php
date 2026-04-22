@extends('layouts.app')

@section('title', 'Appointments')
@section('page-title', 'Appointments')

@section('content')
<div class="space-y-4">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Appointments</h1>
        @if (auth()->user()->isPatient())
            <a href="{{ route('appointments.create') }}" class="btn btn-primary">
                + Book Appointment
            </a>
        @endif
    </div>

    <div class="card">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">{{ auth()->user()->isPatient() ? 'Doctor' : 'Patient' }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Date & Time</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Fee</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $appointment)
                        <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                @if (auth()->user()->isPatient())
                                    Dr. {{ $appointment->doctor->user->name }}
                                @else
                                    {{ $appointment->patient->user->name }}
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                {{ $appointment->appointment_date->format('M d, Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300 capitalize">
                                {{ str_replace('-', ' ', $appointment->appointment_type) }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <span class="badge {{ $appointment->status === 'confirmed' ? 'badge-success' : ($appointment->status === 'cancelled' ? 'badge-danger' : 'badge-info') }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                ${{ number_format($appointment->consultation_fee ?? 0, 2) }}
                            </td>
                            <td class="px-6 py-4 text-sm space-x-2">
                                <a href="{{ route('appointments.show', $appointment) }}" class="btn btn-sm btn-secondary">View</a>
                                @if ($appointment->status !== 'completed' && $appointment->status !== 'cancelled')
                                    @if (auth()->user()->isPatient())
                                        <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Cancel</button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No appointments found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $appointments->links() }}
        </div>
    </div>
</div>
@endsection
