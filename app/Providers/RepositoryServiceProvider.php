<?php

namespace App\Providers;

// Dependencies
use Illuminate\Support\ServiceProvider;

// Interfaces
use App\Contracts\Repositories\UserInterface as UserInterface;

// Repositories
use App\Repositories\UserRepository as UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 
    }

    public function register()
    {
        $this->app->bind('App\Contracts\Repositories\UserInterface', 'App\Repositories\UserRepository');
    }
}
