<?php

namespace App\Providers;

use App\Bus\CommandBus;
use App\Commands\CreateSubmissionCommand;
use App\Commands\CreateSubmissionCommandHandler;
use App\Repositories\Implementations\SubmissionRepository;
use App\Repositories\Interfaces\SubmissionRepositoryInterface;
use App\Services\Implementations\SubmissionService;
use App\Services\Interfaces\SubmissionServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SubmissionServiceInterface::class, SubmissionService::class);
        $this->app->bind(SubmissionRepositoryInterface::class, SubmissionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $commandBus = app(CommandBus::class);

        $commandBus->register([
            CreateSubmissionCommand::class => CreateSubmissionCommandHandler::class
        ]);
    }
}
