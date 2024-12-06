<?php

test('user cannot register with empty email', function () {
    $data = [
        'name' => 'John Doe',
        'username' => 'johndoe',
        'email' => '', 
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ];

    $response = $this->post(route('register'), $data);

    $response->assertSessionHasErrors(['email']);
});
