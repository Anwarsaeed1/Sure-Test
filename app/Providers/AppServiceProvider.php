<?php

namespace App\Providers;
use App\Interfaces\ItemInterface;
use App\Repositories\ItemRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ItemInterface::class, ItemRepository::class); // Singleton
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
