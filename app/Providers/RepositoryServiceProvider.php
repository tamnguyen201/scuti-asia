<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Role\RoleRepositoryInterface::class,
            \App\Repositories\Role\RoleRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Employee\EmployeeRepositoryInterface::class,
            \App\Repositories\Employee\EmployeeRepository::class
        );
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Locations\LocationRepositoryInterface::class,
            \App\Repositories\Locations\LocationRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Manager\ManagerRepositoryInterface::class,
            \App\Repositories\Manager\ManagerRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Company\CompanyRepositoryInterface::class,
            \App\Repositories\Company\CompanyRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Company\CompanyImagesRepositoryInterface::class,
            \App\Repositories\Company\CompanyImagesRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Company\PartnerCompaniesRepositoryInterface::class,
            \App\Repositories\Company\PartnerCompaniesRepository::class,

        );
        $this->app->singleton(
            \App\Repositories\Candidate\CandidateRepositoryInterface::class,
            \App\Repositories\Candidate\CandidateRepository::class,
        );
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
