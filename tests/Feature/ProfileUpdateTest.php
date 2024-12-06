<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('user cannot update profile with invalid data', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'username' => 'johndoe123',
        'email' => 'john@example.com',
        'password' => Hash::make('password123'),
    ]);
    
    $this->actingAs($user);
    
    $data = [
        'name' => '123',
        'username' => '!@#',
        'email' => 'invalid-email',
        'phone_number' => '1234567890',
        'address' => 'Updated Address',
    ];

    $response = $this->patch(route('profile.update'), $data);

    $response->assertSessionHasErrors(['name', 'email']);
});
