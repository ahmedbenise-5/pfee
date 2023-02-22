<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EnseignantsRepositoryInterface;
use App\Repositories\EnseignantsRepository;
use App\Repositories\EtudiantsRepository;
use App\Repositories\EtudiantsRepositoryInterface;


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
        $this->app->bind(EtudiantsRepositoryInterface::class, EtudiantsRepository::class);

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
