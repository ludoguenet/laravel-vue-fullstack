<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\post;

it('can create a user', function () {
    post(
        uri: route('api.users.store'),
        data: [
            'name' => $name = fake()->name,
            'email' => $email = fake()->email,
            'password' => $password = fake()->password,
            'password_confirmation' => $password,
        ]
    )
        ->assertOk()
        ->assertJsonStructure(['success', 'user']);

    assertDatabaseCount('users', 1);

    $user = User::first();

    expect($user->name)->toEqual($name);
    expect($user->email)->toEqual($email);
    expect(Hash::check($password, $user->password))->toBeTrue();
});
