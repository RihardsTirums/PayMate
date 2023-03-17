<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [WalletController::class, 'showWallets'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/wallets', [WalletController::class, 'storeWallet'])->name('wallets.storeWallet');
Route::get('/wallets/create', [WalletController::class, 'showCreateWalletForm'])->name('wallets.create');
Route::get('/wallets/{id}/edit', [WalletController::class, 'editWallet'])->name('wallet.edit');
Route::put('/wallet/{id}', [WalletController::class, 'updateWallet'])->name('wallet.update');
Route::delete('/wallets/{wallet}', [WalletController::class, 'deleteWallet'])->name('wallet.delete');

require __DIR__.'/auth.php';
