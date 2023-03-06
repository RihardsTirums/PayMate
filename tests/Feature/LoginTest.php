<?php

test('a user can log in', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertRedirect('/dashboard');

    $this->assertAuthenticated();
});
