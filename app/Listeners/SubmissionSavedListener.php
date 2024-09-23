<?php

namespace App\Listeners;

use App\Events\SubmissionSavedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SubmissionSavedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SubmissionSavedEvent $event): void
    {
        Log::info('Submission saved successfully', [
            'name' => $event->submission->name,
            'email' => $event->submission->email,
        ]);
    }
}
