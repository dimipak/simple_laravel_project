<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubmissionRequest;
use App\Http\Resources\SubmissionResource;
use App\Services\Interfaces\SubmissionServiceInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmissionController extends Controller
{
    public function __construct(protected SubmissionServiceInterface $submissionService)
    {
    }

    public function store(CreateSubmissionRequest $createSubmissionRequest): JsonResource
    {
        $submission = $this->submissionService->createSubmissionAsync($createSubmissionRequest);

        return new SubmissionResource($submission);
    }
}
