<?php

use Eastslopestudio\Glide\Facades\Glide;

it('can render an image', function () {
    $response = $this->get(Glide::url('ess-logo-color.jpg', ['w' => 200]));

    $response->assertStatus(200);
});

it('shows a 403 if invalid signature', function () {
    $response = $this->get(Glide::url('ess-logo-color.jpg', ['w' => 200], 'invalidsignkey'));

    $response->assertStatus(403);
});

it('shows a 404 if missing image', function () {
    $response = $this->get(Glide::url('missing-image.jpg', ['w' => 200]));

    $response->assertStatus(404);
});

it('shows a 422 if unsupported image type', function () {
    $response = $this->get(Glide::url('ess-logo-color.pdf', ['w' => 200]));

    $response->assertStatus(422);
});
