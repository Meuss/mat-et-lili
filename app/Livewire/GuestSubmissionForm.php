<?php

namespace App\Livewire;

use App\Models\Guest;
use App\Models\Submission;
use App\Mail\SubmissionReceived;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class GuestSubmissionForm extends Component
{
    public string $phone;

    public $comment;

    public $guests = [];

    public function mount(): void
    {
        // Start with one guest entry by default
        $this->guests[] = [
            'first_name' => '',
            'last_name' => '',
            'sleep' => false,
            'allergies' => '',
        ];
    }

    // Add a new guest to the form
    public function addGuest(): void
    {
        $this->guests[] = [
            'first_name' => '',
            'last_name' => '',
            'sleep' => false,
            'allergies' => '',
        ];
    }

    // Remove a guest from the form
    public function removeGuest($index): void
    {
        unset($this->guests[$index]);
        $this->guests = array_values($this->guests); // reindex the array
    }

    // Validate and save the submission and guests
    public function submit(): void
    {
        $this->validate([
            'phone' => 'required|string',
            'comment' => 'nullable|string',
            'guests.*.first_name' => 'required|string',
            'guests.*.last_name' => 'required|string',
            'guests.*.allergies' => 'nullable|string',
        ]);

        if (count($this->guests) === 0) {
            session()->flash('message', 'Vous devez ajouter au moins un invité.');
            return;
        }

        try {
            // Create submission
            $submission = Submission::create([
                'phone' => $this->phone,
                'comment' => $this->comment,
            ]);
            // Create guests
            foreach ($this->guests as $guestData) {
                $guestData['submission_id'] = $submission->id;
                Guest::create($guestData);
            }
            // Send a notification email
            Mail::to('mariage@mat-et-lili.ch')
                ->bcc('thomas.miller147@gmail.com')
                ->send(new SubmissionReceived($submission, $this->guests));

            // Show a success message
            session()->flash('message-success', 'Merci, on a bien reçu. Pour toute question, n\'hésitez pas à nous contacter directement. Gros bisous!');
        } catch (Exception $e) {
            Log::error('Submission Error: ' . $e->getMessage());
            session()->flash('message', 'Une erreur est survenue. Veuillez réessayer.');
            return;
        }

    }

    public function render(): View|Factory|Application
    {
        return view('livewire.guest-submission-form');
    }
}
