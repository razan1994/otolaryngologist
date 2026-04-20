<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $first_name;
    public $last_name;
    public $phone;
    public $country_key;
    public $appointment_date;
    public $start_time;
    public $end_time;
    public $notes;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->subject = $data['subject'] ?? 'Appointment Details';
        $this->first_name = $data['first_name'] ?? '';
        $this->last_name = $data['last_name'] ?? '';
        $this->phone = $data['phone'] ?? '';
        $this->country_key = $data['country_key'] ?? '';
        $this->appointment_date = $data['appointment_date'] ?? '';
        $this->start_time = $data['start_time'] ?? '';
        $this->end_time = $data['end_time'] ?? '';
        $this->notes = $data['notes'] ?? '';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->view('emails.appointment')
            ->with([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone,
                'country_key' => $this->country_key,
                'appointment_date' => $this->appointment_date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'notes' => $this->notes,
                'subject' => $this->subject,
            ]);
    }
}
