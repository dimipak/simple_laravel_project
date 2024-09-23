<?php

namespace App\Jobs;

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
    public function __construct(protected array $data)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(SubmissionRepositoryInterface $submissionRepository): void
    {
        $submissionRepository->create($this->data);
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
