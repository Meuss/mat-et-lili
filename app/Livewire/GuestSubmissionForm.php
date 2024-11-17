<?php

namespace App\Livewire;

use App\Models\Guest;
use App\Models\Submission;
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

        // Reset the form or show a success message
        $this->reset();
        session()->flash('message', 'Merci, on a bien reçu. Pour toute question, n\'hésitez pas à nous contacter directement. Gros bisous!');
    }

    public function render(): View|Factory|Application
    {
        return view('livewire.guest-submission-form');
    }
}
