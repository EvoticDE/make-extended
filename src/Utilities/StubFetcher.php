<?php

namespace Evotic\MakeExtended\Utilities;

use Illuminate\Support\Facades\File;

class StubFetcher {

    /**
     * Get the content of a stub file
     *
     * @param $stubName
     * @return false|string
     */
    public static function getStub($stubName): false|string {
        $publishedStubPath = resource_path("stubs/make-extended/{$stubName}.stub");
        if (File::exists($publishedStubPath)) {
            return file_get_contents($publishedStubPath);
        }

        return file_get_contents(__DIR__ . "/../Stubs/{$stubName}.stub");
    }


}