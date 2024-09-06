<?php

namespace Evotic\MakeExtended\Commands;

use Evotic\MakeExtended\Utilities\StubFetcher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeContractCommand extends Command {

    protected $signature = "make:contract {name}";
    protected $description = "Creates a new contract class, also in subdirectories";

    public function handle() {
        $name = $this->argument("name");
        $contractPath = app_path("Contracts/" . $name . ".php");
        $directory = dirname($contractPath);
        File::ensureDirectoryExists($directory);

        if (File::exists($contractPath)) {
            $this->components->error("Contract already exists!");
            return;
        }

        $stub = StubFetcher::getStub("Contract");
        $className = basename($name);
        $stub = str_replace("{{ class }}", $className, $stub);

        File::put($contractPath, $stub);

        $formattedContractPath = str_replace("/", DIRECTORY_SEPARATOR, $contractPath);
        $this->components->info("Contract [{$formattedContractPath}] created successfully.");
    }

}