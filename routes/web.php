<?php

use Eastslopestudio\Glide\Http\Controllers\GlideController;
use Illuminate\Support\Facades\Route;

Route::get(config('glide.base_url').'/{path}', GlideController::class)->where('path', '.*');
