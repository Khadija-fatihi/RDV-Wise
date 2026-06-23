<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\MedicalRecordsAccessRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class RecordAccessNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_patient_can_approve_a_medical_records_request(): void
    {
        $doctor = User::factory()->create([
            'role' => 'medecin',
            'name' => 'Dr. Miller',
        ]);

        $patient = User::factory()->create([
            'role' => 'patient',
            'name' => 'Patient One',
        ]);

        Notification::send($patient, new MedicalRecordsAccessRequest($doctor, 'requested temporary access to your medical history for your upcoming consultation.'));

        $notification = $patient->notifications()->latest()->firstOrFail();

        $this->actingAs($patient)
            ->post(route('record-access.response', ['id' => $notification->id]), [
                'decision' => 'approved',
            ])
            ->assertRedirect();

        $notification->refresh();
        $data = $notification->data;

        $this->assertSame('approved', $data['status']);
        $this->assertSame('Dr. Miller', $data['doctor_name']);
    }
}
