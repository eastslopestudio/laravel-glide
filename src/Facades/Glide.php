<?php

namespace Eastslopestudio\Glide\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Eastslopestudio\Glide\Glide
 */
class Glide extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Eastslopestudio\Glide\Glide::class;
    }
}
