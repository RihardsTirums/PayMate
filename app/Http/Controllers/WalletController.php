<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function showWallets(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();
        $wallets = Wallet::where('user_id', $user->id)->get();

        return view('dashboard', ['wallets' => $wallets]);
    }

    public function storeWallet(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $wallet = new Wallet();
        $wallet->name = $validatedData['name'];
        $wallet->user_id = Auth::id();
        $wallet->save();

        return redirect()->route('dashboard')->with('success', 'Wallet created successfully.');
    }

    public function showCreateWalletForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('wallet.create');
    }

    public function editWallet($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $wallet = Wallet::findOrFail($id);
        return view('wallet.update', ['wallet' => $wallet]);
    }

    public function updateWallet(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'new_name' => 'required|string|max:255',
        ]);

        $wallet = Wallet::findOrFail($id);
        $wallet->name = $validatedData['new_name'];
        $wallet->save();

        return redirect()->route('dashboard')->with('success', 'Wallet renamed successfully.');
    }

    public function deleteWallet(Wallet $wallet): RedirectResponse
    {
        $wallet->delete();

        return redirect()->route('dashboard')->with('success', 'Wallet deleted successfully.');
    }
}
