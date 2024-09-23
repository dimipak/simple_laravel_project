<?php

namespace App\Services\Interfaces;

use App\Http\Requests\CreateSubmissionRequest;
use App\Models\Submission;

interface SubmissionServiceInterface
{
    public function createSubmission(CreateSubmissionRequest $createSubmissionRequest): Submission;

    public function createSubmissionAsync(CreateSubmissionRequest $createSubmissionRequest): Submission;
}
