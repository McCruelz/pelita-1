<?php


test('user cannot register with empty password', function () {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'password' => '',
        'password_confirmation' => '',
    ];

    $response = $this->post(route('register'), $data);

    $response->assertRedirect(route('register'));

    $response->assertSessionHasErrors(['password']); 
});
