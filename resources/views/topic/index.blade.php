<x-guest-layout>
    <div class="max-w-xl mx-auto rounded-lg overflow-hidden mb-8">
        <h1 class="text-2xl font-bold">Open Topic</h1>
        <p class="mt-2">
            Enter the uniqe valid 16-digit token related to the topic you want to see.
        </p>
    </div>
    <div class="max-w-xl mx-auto rounded-lg overflow-hidden" x-data="{url:''}">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                    <label for="token" class="block text-sm font-medium text-gray-700">
                        Token
                    </label>
                    <input type="text" name="token" id="token" minlength="16" maxlength="16" required x-model="url"
                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                        placeholder="Enter the 16 digit token">
                    @error('token')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <a :href="location+'/'+url"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Open
            </a>
        </div>

    </div>
</x-guest-layout>
