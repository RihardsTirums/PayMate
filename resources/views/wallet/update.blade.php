<x-app-layout>
    <div class="max-w-xl mx-auto bg-gray-800 rounded-lg shadow-md px-6 py-4">
        <h1 class="text-2xl font-semibold text-white mb-4">Update Wallet Name</h1>
        <form method="POST" action="{{ route('wallet.update', $wallet->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="new_name" class="sr-only">New Wallet Name:</label>
                <input type="text" id="new_name" name="new_name" value="{{ old('new_name') ?: $wallet->name }}"
                       class="dark:bg-gray-700 text-white border border-gray-400 rounded-md w-full py-2 px-3 leading-tight focus:outline-none focus:border-blue-500 focus:ring-blue-500">
                @error('new_name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-6">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out"
                        name="rename">Rename
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
