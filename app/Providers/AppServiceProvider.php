<?php

namespace App\Providers;

use App\Repositories\AuthenticateRepository;
use App\Repositories\AuthenticateRepositoryUsers;
use App\Repositories\CartRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\HomeRepositoryUsers;
use App\Repositories\Interface\AuthenticateRepositoryInterface;
use App\Repositories\Interface\AuthenticateRepositoryInterfaceUsers;
use App\Repositories\Interface\CartRepositoryInterface;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\HomeRepositoryInterfaceUsers;
use App\Repositories\Interface\ProductRepositoryInterface;
use App\Repositories\Interface\ProductRepositoryInterfaceUsers;
use App\Repositories\Interface\UsersRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryUsers;
use App\Repositories\UsersRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CategoryRepositoryInterface::class => CategoryRepository::class,
        ProductRepositoryInterface::class => ProductRepository::class,
        UsersRepositoryInterface::class => UsersRepository::class,
        CartRepositoryInterface::class => CartRepository::class,
        AuthenticateRepositoryInterface::class => AuthenticateRepository::class,
        AuthenticateRepositoryInterfaceUsers::class=>AuthenticateRepositoryUsers::class,
        HomeRepositoryInterfaceUsers::class=>HomeRepositoryUsers::class,
        ProductRepositoryInterfaceUsers::class=>ProductRepositoryUsers::class,
        // key => value
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
