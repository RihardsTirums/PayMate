<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <a href="{{ route('wallets.create') }}"
           class="block text-center text-white bg-blue-500 rounded hover:bg-blue-600 py-2 px-4 font-semibold mb-4">Create
            Wallet</a>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold text-white mb-4">My Wallets</h1>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @forelse ($wallets as $wallet)
                            <div class="bg-gray-800 rounded-lg shadow-md text-white">
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h2 class="text-lg font-medium">{{ $wallet->name }}</h2>
                                        <div class="flex flex-col items-end space-y-2">
                                            <a href="{{ route('wallet.edit', $wallet->id) }}"
                                               class="text-blue-500 hover:text-blue-600">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('wallet.delete', $wallet->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-600">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-400">{{ $wallet->transactions->count() }}
                                        transactions</p>
                                    <p class="text-sm text-gray-400">Balance:
                                        ${{ number_format($wallet->balance, 2) }}</p>
                                </div>
                                <div class="p-4 bg-gray-700">
                                    <a href="#"
                                       class="block text-center text-white bg-blue-500 hover:bg-blue-600 rounded py-2 px-4 font-semibold transition duration-300 ease-in-out">View
                                        Transactions</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-white">No wallets found.</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
