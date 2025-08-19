<?php

namespace App\Providers;

use App\Interfaces\TeacherRepositoryInterface;
use App\Repositories\TeacherRepository;
use Illuminate\Support\ServiceProvider;

class TeacherProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
