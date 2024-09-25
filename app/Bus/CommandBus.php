<?php

namespace App\Bus;

use Illuminate\Bus\Dispatcher;

class CommandBus
{
    public function __construct(protected Dispatcher $dispatcher) {}

    public function dispatch(Command $command): mixed
    {
        return $this->dispatcher->dispatch($command);
    }

    public function register(array $map): void
    {
        $this->dispatcher->map($map);
    }
}
