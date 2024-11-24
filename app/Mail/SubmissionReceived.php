<?php

namespace App\Mail;

use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubmissionReceived extends Mailable
{
    use Queueable;
    use SerializesModels;

    public Submission $submission;
    public array $guests;

    /**
     * Create a new message instance.
     */
    public function __construct(Submission $submission, array $guests)
    {
        $this->submission = $submission;
        $this->guests = $guests;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Inscription Mariage',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.submission_received',
        );
    }
}
