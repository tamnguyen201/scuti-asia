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
            \App\Repositories\Job\JobRepositoryInterface::class,
            \App\Repositories\Job\JobRepository::class
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
        $this->app->singleton(
            \App\Repositories\CV\CVRepositoryInterface::class,
            \App\Repositories\CV\CVRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Client\SectionRepositoryInterface::class,
            \App\Repositories\Client\SectionRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Company\ContactRepositoryInterface::class,
            \App\Repositories\Company\ContactRepository::class,
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
