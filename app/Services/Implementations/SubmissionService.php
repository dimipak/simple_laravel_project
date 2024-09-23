<?php

namespace App\Services\Implementations;

use App\Http\Requests\CreateSubmissionRequest;
use App\Jobs\CreateSubmissionJob;
use App\Models\Submission;
use App\Repositories\Interfaces\SubmissionRepositoryInterface;
use App\Services\Interfaces\SubmissionServiceInterface;

class SubmissionService implements SubmissionServiceInterface
{
    /**
     * @param  SubmissionRepositoryInterface  $submissionRepository
     */
    public function __construct(
        protected SubmissionRepositoryInterface $submissionRepository
    )
    {}

    /**
     * @param  CreateSubmissionRequest  $createSubmissionRequest
     * @return Submission
     */
    public function createSubmission(CreateSubmissionRequest $createSubmissionRequest): Submission
    {
        return $this->submissionRepository->create($createSubmissionRequest->toArray());
    }

    /**
     * @param  CreateSubmissionRequest  $createSubmissionRequest
     * @return Submission
     */
    public function createSubmissionAsync(CreateSubmissionRequest $createSubmissionRequest): Submission
    {
        CreateSubmissionJob::dispatch($createSubmissionRequest->toArray());

        return new Submission($createSubmissionRequest->toArray());
    }
}
