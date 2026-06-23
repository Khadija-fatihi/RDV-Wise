<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MedicalRecordsAccessRequest extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected User $doctor,
        protected string $message = 'requested temporary access to your medical history for your upcoming consultation.'
    ) {
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'type' => 'medical_records_request',
            'doctor_id' => $this->doctor->id,
            'doctor_name' => $this->doctor->name ?: 'Your doctor',
            'status' => 'pending',
            'message' => $this->message,
            'created_at' => now()->toIso8601String(),
        ];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Medical records access requested')
            ->line($this->doctor->name . ' requested access to your medical records.')
            ->action('Open notifications', url('/notifications'));
    }
}
