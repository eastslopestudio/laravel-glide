<?php

use Eastslopestudio\Glissade\Http\Controllers\GlissadeController;
use Illuminate\Support\Facades\Route;

Route::get(config('glissade.base_url').'/{path}', GlissadeController::class)->where('path', '.*');
