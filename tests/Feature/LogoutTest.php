<?php

test('a user can log out', function () {
    $user = \App\Models\User::factory()->create();

    $this->actingAs($user);

    $response = $this->post('/logout');

    $response->assertRedirect('/');

    $this->assertGuest();
});
