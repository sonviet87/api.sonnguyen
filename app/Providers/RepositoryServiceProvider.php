<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('App\Interfaces\InputWarehouseInterface', 'App\Repositories\InputWarehouseRepository');
        $this->app->bind('App\Interfaces\InputWarehouseInfoInterface', 'App\Repositories\InputWarehouseInfoRepository');
        $this->app->bind('App\Interfaces\OutputWarehouseInterface', 'App\Repositories\OutputWarehouseRepository');
        $this->app->bind('App\Interfaces\OutputWarehouseInfoInterface', 'App\Repositories\OutputWarehouseInfoRepository');
        $this->app->bind('App\Interfaces\UserInterface', 'App\Repositories\UserRepository');
        $this->app->bind('App\Interfaces\UnitInterface', 'App\Repositories\UnitRepository');
        $this->app->bind('App\Interfaces\SuplierInterface', 'App\Repositories\SuplierRepository');
        $this->app->bind('App\Interfaces\BranchInterface', 'App\Repositories\BranchRepository');
        $this->app->bind('App\Interfaces\ProductInterface', 'App\Repositories\ProductRepository');
        $this->app->bind('App\Interfaces\ManagerInterface', 'App\Repositories\ManagerRepository');

    }
}
