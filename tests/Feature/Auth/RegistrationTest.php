<?php

use App\Models\User;

test('user can register successfully', function () {
    $data = [
        'name' => 'John Doe',
        'username' => 'johndoe123',
        'email' => 'john@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ];

    $response = $this->post(route('register'), $data);

    $response->assertRedirect(route('home'));

    $this->assertDatabaseHas('users', [
        'email' => 'john@example.com',
    ]);

    $this->assertAuthenticatedAs(User::where('email', 'john@example.com')->first());
});

