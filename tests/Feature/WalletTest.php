<?php

use App\Models\User;
use App\Models\Wallet;

it('can create and store a wallet', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/wallets', [
        'name' => 'My New Wallet',
    ]);

    $response->assertRedirect('/dashboard');

    $this->assertDatabaseHas('wallets', [
        'name' => 'My New Wallet',
        'user_id' => $user->id,
    ]);
});

test('a user can rename a wallet', function () {

    $user = User::factory()->create();
    $wallet = Wallet::factory()->create(['user_id' => $user->id]);

    $this->actingAs($user);

    $response = $this->get(route('wallet.edit', $wallet->id));
    $response->assertOk();

    $newName = 'New Wallet Name';
    $response = $this->put(route('wallet.update', $wallet->id), [
        'new_name' => $newName,
    ]);

    $this->assertDatabaseHas('wallets', [
        'id' => $wallet->id,
        'name' => $newName,
    ]);

    $response->assertRedirect(route('dashboard'));
    $response->assertSessionHas('success', 'Wallet renamed successfully.');
});


