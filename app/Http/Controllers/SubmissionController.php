<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubmissionRequest;
use App\Http\Resources\SubmissionResource;
use App\Services\Interfaces\SubmissionServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmissionController extends Controller
{
    public function __construct(protected SubmissionServiceInterface $submissionService) {}

    public function store(CreateSubmissionRequest $createSubmissionRequest): JsonResponse
    {
        $this->submissionService->createSubmission($createSubmissionRequest);

        return response()->json([
            'message' => 'Submission created.'
        ]);
    }
}
