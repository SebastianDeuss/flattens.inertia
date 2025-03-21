<?php

namespace Flatinertia;

use Illuminate\Support\Facades\Facade;

class Inertia extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Inertia\ResponseFactory::class;
    }
}
