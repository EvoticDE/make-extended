<?php

namespace Evotic\MakeExtended\Commands;

use Evotic\MakeExtended\Utilities\StubFetcher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepositoryCommand extends Command {

    protected $signature = "make:repository {name}";
    protected $description = "Creates a new repository class, also in subdirectories";

    public function handle() {
        $name = $this->argument("name");
        $repositoryPath = app_path("Repositories/" . $name . ".php");
        $directory = dirname($repositoryPath);
        File::ensureDirectoryExists($directory);

        if (File::exists($repositoryPath)) {
            $this->components->error("Repository already exists!");
            return;
        }

        $stub = StubFetcher::getStub("Repository");
        $className = basename($name);
        $stub = str_replace("{{ class }}", $className, $stub);

        File::put($repositoryPath, $stub);

        $formattedRepositoryPath = str_replace("/", DIRECTORY_SEPARATOR, $repositoryPath);
        $this->components->info("Repository [{$formattedRepositoryPath}] created successfully.");
    }

}