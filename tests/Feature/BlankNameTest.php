<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

test('user cannot update profile with empty name', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'username' => 'johndoe123',
        'email' => 'john.doe@example.com',
    ]);

    $this->actingAs($user);

    $data = [
        'name' => '',
        'email' => 'john.doe@example.com',
    ];

    $response = $this->patch(route('profile.update'), $data);

    $response->assertSessionHasErrors('name');
});
