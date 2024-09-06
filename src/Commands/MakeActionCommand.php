<?php

namespace Evotic\MakeExtended\Commands;

use Evotic\MakeExtended\Utilities\StubFetcher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeActionCommand extends Command {

    protected $signature = "make:action {name}";
    protected $description = "Creates a new action class, also in subdirectories";

    public function handle() {
        $name = $this->argument("name");
        $actionPath = app_path("Actions/" . $name . ".php");
        $directory = dirname($actionPath);
        File::ensureDirectoryExists($directory);

        if (File::exists($actionPath)) {
            $this->components->error("Action already exists!");
            return;
        }

        $stub = StubFetcher::getStub("Action");
        $className = basename($name);
        $stub = str_replace("{{ class }}", $className, $stub);

        File::put($actionPath, $stub);

        $formattedActionPath = str_replace("/", DIRECTORY_SEPARATOR, $actionPath);
        $this->components->info("Action [{$formattedActionPath}] created successfully.");
    }

}