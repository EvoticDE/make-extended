<?php

namespace Evotic\MakeExtended\Commands;

use Evotic\MakeExtended\Utilities\StubFetcher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeDTOCommand extends Command {

    protected $signature = "make:dto {name}";
    protected $description = "Creates a new DTO class, also in subdirectories";

    public function handle() {
        $name = $this->argument("name");
        $dtoPath = app_path("DTOs/" . $name . ".php");
        $directory = dirname($dtoPath);
        File::ensureDirectoryExists($directory);

        if (File::exists($dtoPath)) {
            $this->components->error("DTO already exists!");
            return;
        }

        $stub = StubFetcher::getStub("DTO");
        $className = basename($name);
        $stub = str_replace("{{ class }}", $className, $stub);

        File::put($dtoPath, $stub);

        $formattedDTOPath = str_replace("/", DIRECTORY_SEPARATOR, $dtoPath);
        $this->components->info("DTO [{$formattedDTOPath}] created successfully.");
    }

}