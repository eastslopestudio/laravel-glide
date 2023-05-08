<?php

namespace Eastslopestudio\Glissade\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Eastslopestudio\Glissade\Glissade
 */
class Glissade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Eastslopestudio\Glissade\Glissade::class;
    }
}
