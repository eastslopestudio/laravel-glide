<?php

namespace Eastslopestudio\Glide;

use Illuminate\Support\Facades\URL;
use League\Glide\Urls\UrlBuilderFactory;

class Glide
{
    public function url(string $path, ?array $manipulations = [], string $signKey = null): string
    {
        $builder = UrlBuilderFactory::create(config('glide.base_url'), $signKey ?? env('APP_KEY'));

        return URL::to($builder->getUrl($path, $manipulations));
    }
}
