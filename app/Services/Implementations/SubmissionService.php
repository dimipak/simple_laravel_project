<?php

namespace App\Services\Implementations;

use App\Bus\CommandBus;
use App\Commands\CreateSubmissionCommand;
use App\Http\Requests\CreateSubmissionRequest;
use App\Services\Interfaces\SubmissionServiceInterface;

class SubmissionService implements SubmissionServiceInterface
{
    /**
     * @param  CommandBus  $commandBus
     */
    public function __construct(
        protected CommandBus $commandBus
    ) {}

    /**
     * @param  CreateSubmissionRequest  $createSubmissionRequest
     * @return void
     */
    public function createSubmission(CreateSubmissionRequest $createSubmissionRequest): void
    {
        $this->commandBus->dispatch(new CreateSubmissionCommand(
            name: $createSubmissionRequest->get('name'),
            email: $createSubmissionRequest->get('email'),
            message: $createSubmissionRequest->get('message'),
        ));
    }
}
