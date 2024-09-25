<?php

namespace App\Bus;

use Illuminate\Bus\Dispatcher;

class QueryBus
{
    public function __construct(protected Dispatcher $dispatcher) {}

    public function ask(Query $query): mixed
    {
        return $this->dispatcher->dispatch($query);
    }
}
