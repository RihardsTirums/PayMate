<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-900">
                    <h2 class="font-bold text-2xl mb-4 text-white">Create Wallet</h2>

                    <form action="{{ route('wallets.storeWallet') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="font-medium text-white">Name</label>
                            <input type="text" name="name" id="name"
                                   class="form-input mt-1 block w-full dark:bg-gray-700 text-white border-gray-500"
                                   value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
