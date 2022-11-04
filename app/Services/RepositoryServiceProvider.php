<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider{

    public function register(){
        $this->app->bind(
            'App\Repositories\Interfaces\Order\OrderInterface',
            'App\Repositories\Order\OrderRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\Product\ProductInterface',
            'App\Repositories\Product\ProductRepository'
        );
    }
}
