<?php

namespace Evotic\MakeExtended\Commands;

use Evotic\MakeExtended\Utilities\StubFetcher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command {

    protected $signature = "make:service {name}";
    protected $description = "Creates a new service class, also in subdirectories";

    public function handle() {
        $name = $this->argument("name");
        $servicePath = app_path("Services/" . $name . ".php");
        $directory = dirname($servicePath);
        File::ensureDirectoryExists($directory);

        if (File::exists($servicePath)) {
            $this->components->error("Service already exists!");
            return;
        }

        $stub = StubFetcher::getStub("Service");
        $className = basename($name);
        $stub = str_replace("{{ class }}", $className, $stub);

        File::put($servicePath, $stub);

        $formattedServicePath = str_replace("/", DIRECTORY_SEPARATOR, $servicePath);
        $this->components->info("Service [{$formattedServicePath}] created successfully.");
    }

}