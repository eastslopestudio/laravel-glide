<?php

namespace Eastslopestudio\Glissade;

use Illuminate\Support\Facades\URL;
use League\Glide\Urls\UrlBuilderFactory;

class Glissade
{
    public function url(string $path, ?array $manipulations = [], string $signKey = null): string
    {
        $builder = UrlBuilderFactory::create(config('glissade.base_url'), $signKey ?? env('APP_KEY'));

        return URL::to($builder->getUrl($path, $manipulations));
    }
}
