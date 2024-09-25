<?php

namespace App\Jobs;

use App\Bus\CommandBus;
use App\Commands\CreateSubmissionCommand;
use App\Repositories\Interfaces\SubmissionRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Throwable;

class CreateSubmissionJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected CreateSubmissionCommand $command)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(CommandBus $bus): void
    {
        $bus->dispatch($this->command);
    }

    /**
     * Handle a job failure.
     */
    public function failed(?Throwable $exception): void
    {
        Log::error('JOB_FAILED: ' . $exception->getMessage(), [
            'code' => $exception->getCode(),
            'line' => $exception->getLine(),
            'file' => $exception->getFile()
        ]);
    }
}
