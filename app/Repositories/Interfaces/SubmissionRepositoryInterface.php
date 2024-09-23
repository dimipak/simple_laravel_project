<?php

namespace App\Repositories\Interfaces;

use App\Models\Submission;

interface SubmissionRepositoryInterface
{
    public function create(array $data): Submission;
}
