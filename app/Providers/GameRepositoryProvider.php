<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GameRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('GameRepository', '\Modules\Game\Repositories\GameRepository' );
    }
}
