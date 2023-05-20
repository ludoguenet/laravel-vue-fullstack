<?php

declare(strict_types=1);

use App\Models\User;
use function Pest\Laravel\get;

it('can show a user', function () {
    $user = User::factory()->create();

    get(route('api.users.show', $user->id))
        ->assertOk();
})->only();

it('can not show a user', function () {
    get(route('api.users.show', 1))
        ->assertNotFound();
})->only();
