<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AttendanceReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "ASISTENCIA - INTESA";

    public $attendance;
    public $studentAttendance;
    public $group;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($attendance, $studentAttendance, $group)
    {
        //
        $this->attendance = $attendance;
        $this->studentAttendance = $studentAttendance;
        $this->group = $group;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: '💎Asistencia INTESA - '.$this->attendance->date. " - " .$this->group["name"],
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.attendanceReceived',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
