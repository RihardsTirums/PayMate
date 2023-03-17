<?php

use App\Models\User;
use App\Models\Wallet;

it('displays user wallets when authenticated', function () {

    $user = User::factory()->create();
    $this->actingAs($user);

    $wallets = Wallet::factory()->count(3)->create(['user_id' => $user->id]);

    $response = $this->get('/dashboard');

    $response->assertOk();

    foreach ($wallets as $wallet) {
        $response->assertSee($wallet->name);
    }
});

it('does not display wallets when not authenticated', function () {

    $response = $this->get('/dashboard');

    $response->assertRedirect('/login');
});






