<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

test('user cannot register with invalid email format', function () {
    $data = [
        'name' => 'John Doe',
        'username' => 'johndoe123',
        'email' => 'john.doeexample.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ];

    $response = $this->post(route('register'), $data);

    $response->assertRedirect(route('register'));

    $response->assertSessionHasErrors(['email' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.']);
});
