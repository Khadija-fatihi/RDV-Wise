<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AppointmentNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Appointment $appointment,
        public string $recipientRole = 'patient',
        public string $status = 'scheduled'
    ) {
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable): array
    {
        $appointmentDate = $this->appointment->date_heure;
        $doctorName = $this->appointment->doctor?->user?->name ?? $this->appointment->doctor?->name ?? 'Doctor';
        $patientName = $this->appointment->patient?->user?->name ?? 'Patient';
        $formattedDate = $appointmentDate?->format('M d, Y') ?? 'unknown date';
        $formattedTime = $appointmentDate?->format('H:i') ?? 'unknown time';
        $channel = $this->determineChannel($notifiable);

        $title = match ([$this->recipientRole, $this->status]) {
            ['patient', 'scheduled'] => 'Appointment confirmed',
            ['doctor', 'scheduled'] => 'New appointment booked',
            ['patient', 'confirmed'] => 'Appointment confirmed',
            ['doctor', 'confirmed'] => 'Appointment confirmed',
            ['patient', 'cancelled'] => 'Appointment cancelled',
            ['doctor', 'cancelled'] => 'Appointment cancelled',
            default => 'Appointment update',
        };

        if ($this->recipientRole === 'doctor') {
            $message = match ($this->status) {
                'scheduled' => "A new appointment with patient {$patientName} is scheduled for {$formattedDate} at {$formattedTime}. Reminder will be sent via {$channel} before the appointment.",
                'confirmed' => "The appointment with patient {$patientName} for {$formattedDate} at {$formattedTime} has been confirmed.",
                'cancelled' => "The appointment with patient {$patientName} for {$formattedDate} at {$formattedTime} has been cancelled.",
                default => "Appointment status updated for patient {$patientName} on {$formattedDate} at {$formattedTime}.",
            };
        } else {
            $message = match ($this->status) {
                'scheduled' => "Your appointment with Dr. {$doctorName} is scheduled for {$formattedDate} at {$formattedTime}. Reminder will be sent via {$channel} before the appointment.",
                'confirmed' => "Your appointment with Dr. {$doctorName} for {$formattedDate} at {$formattedTime} has been confirmed.",
                'cancelled' => "Your appointment with Dr. {$doctorName} for {$formattedDate} at {$formattedTime} has been cancelled.",
                default => "Appointment status updated with Dr. {$doctorName} on {$formattedDate} at {$formattedTime}.",
            };
        }

        return [
            'type' => 'appointment_' . $this->status,
            'title' => $title,
            'message' => $message,
            'appointment_date' => $appointmentDate?->toIso8601String(),
            'doctor_name' => $doctorName,
            'patient_name' => $patientName,
            'channel' => $channel,
        ];
    }

    protected function determineChannel($notifiable): string
    {
        if (! empty($notifiable->phone) && $notifiable->sms_notifications) {
            return 'phone';
        }

        return 'email';
    }
}
