<?php

namespace Ariaservice\Virtualizor\Facades;

use Illuminate\Support\Facades\Facade;

class Virtualizor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'virtualizor';
    }
}
