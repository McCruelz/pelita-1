<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('user can delete account with valid password', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => Hash::make('password123'),
    ]);

    $this->actingAs($user);

    $response = $this->delete(route('profile.destroy'), [
        'password' => 'password123',
    ]);

    $this->assertDeleted($user);

    $this->assertGuest();

});
