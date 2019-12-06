<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FileProvider extends ServiceProvider
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
        //
        $this->app->bind('App\Library\Services\FileService\MyFileHandlerInterface','App\Library\Services\FileService\MyFileHandler');
    }
}
