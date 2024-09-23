<?php

namespace App\Repositories\Implementations;

use App\Models\Submission;
use App\Repositories\Interfaces\SubmissionRepositoryInterface;

class SubmissionRepository implements SubmissionRepositoryInterface
{
    /**
     * @param  Submission  $submission
     */
    public function __construct(
        protected Submission $submission
    )
    {}

    /**
     * @param  array  $data
     * @return Submission
     */
    public function create(array $data): Submission
    {
        return $this->submission::query()->create($data);
    }
}
