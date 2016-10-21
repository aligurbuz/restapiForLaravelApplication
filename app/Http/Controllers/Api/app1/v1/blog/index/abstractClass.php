<?php

namespace App\Http\Controllers\Api\app1\v1\blog\index;

abstract class abstractClass
{
    // Force Extending class to define this method
    abstract protected function main();

    // Common method
    public function get($data) {

        return app("\\App\\Http\\Controllers\\Api\\versionControl")->get($data,function() {

            return app("\\App\\Http\\Controllers\\Api\\config")->response($this->main());
        });

    }
}