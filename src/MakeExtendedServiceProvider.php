<?php

namespace Evotic\MakeExtended;

use Evotic\MakeExtended\Commands\MakeDTOCommand;
use Evotic\MakeExtended\Commands\MakeRepositoryCommand;
use Evotic\MakeExtended\Commands\MakeServiceCommand;
use Illuminate\Support\ServiceProvider;

class MakeExtendedServiceProvider extends ServiceProvider {

    public function register() {

    }

    public function boot() {
        $this->publishes([
            __DIR__ . "/Stubs" => resource_path("stubs/make-extended")
        ], "make-extended-stubs");

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeServiceCommand::class,
                MakeRepositoryCommand::class,
                MakeDTOCommand::class
            ]);
        }
    }

}