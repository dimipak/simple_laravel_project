<?php

namespace App\Commands;

use App\Bus\CommandHandler;
use App\Repositories\Implementations\SubmissionRepository;

class CreateSubmissionCommandHandler extends CommandHandler
{
    public function __construct(protected SubmissionRepository $submissionRepository) {}

    public function handle(CreateSubmissionCommand $command): void
    {
        $this->submissionRepository->create([
            'name' => $command->name,
            'email' => $command->email,
            'message' => $command->message
        ]);
    }
}
