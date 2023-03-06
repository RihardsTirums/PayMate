<?php

test('a user can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'testuser@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertRedirect('/dashboard');

    expect(\App\Models\User::where('email', 'testuser@example.com')->exists())->toBeTrue();
});

