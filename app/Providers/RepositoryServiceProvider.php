<?php

namespace App\Providers;

use App\Repositories\ExameRepository;
use App\Repositories\FraisRepository;
use App\Repositories\FactureRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\MatieresRepository;
use App\Repositories\PresenceRepository;
use App\Repositories\EtudiantsRepository;
use App\Repositories\EnseignantsRepository;
use App\Repositories\RecuEtudiantRepository;
use App\Repositories\RecuDeEchangeRepository;
use App\Repositories\ExameRepositoryInterface;
use App\Repositories\FraisRepositoryInterface;
use App\Repositories\FraisTraitementRepository;
use App\Repositories\FactureRepositoryInterface;
use App\Repositories\MatieresRepositoryInterface;
use App\Repositories\PresenceRepositoryInterface;
use App\Repositories\EtudiantsRepositoryInterface;
use App\Repositories\EnseignantsRepositoryInterface;
use App\Repositories\RecuEtudiantRepositoryInterface;
use App\Repositories\RecuDeEchangeRepositoryInterface;
use App\Repositories\FraisTraitementRepositoryInterface;



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
        $this->app->bind(FraisRepositoryInterface::class, FraisRepository::class);
        $this->app->bind(FactureRepositoryInterface::class, FactureRepository::class);
        $this->app->bind(RecuEtudiantRepositoryInterface::class, RecuEtudiantRepository::class);
        $this->app->bind(FraisTraitementRepositoryInterface::class, FraisTraitementRepository::class);
        $this->app->bind(RecuDeEchangeRepositoryInterface::class, RecuDeEchangeRepository::class);
        $this->app->bind(PresenceRepositoryInterface::class, PresenceRepository::class);
        $this->app->bind(MatieresRepositoryInterface::class, MatieresRepository::class);
        $this->app->bind(ExameRepositoryInterface::class, ExameRepository::class);
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
