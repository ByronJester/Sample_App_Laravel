<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UsersManagementRepository\RepositoryInterface;
use App\Repositories\UsersManagementRepository\UsersRepository;
use App\Repositories\ProfileManagementRepository\ProfileRepositoryInterface;
use App\Repositories\ProfileManagementRepository\ProfileRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(RepositoryInterface::class, UsersRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
    }
}
