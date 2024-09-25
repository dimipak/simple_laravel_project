<?php

namespace App\Commands;

use App\Bus\Command;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateSubmissionCommand extends Command implements ShouldQueue
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $message,
    )
    {}
}
