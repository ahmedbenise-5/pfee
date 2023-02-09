<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EnseignantsRepositoryInterface;
use App\Repositories\EnseignantsRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(EnseignantsRepositoryInterface::class, EnseignantsRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
