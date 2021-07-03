<form method="post" wire:submit.prevent="store">
    @csrf
    <div class="px-4 py-5 bg-white sm:p-6">
        <input type="hidden" wire:model="token" readonly>
        <div class="relative">
            <label for="token" class="block text-sm font-bold text-gray-700">
                {{ __('Your Comment') }}
            </label>
            <textarea id="comment" name="comment" rows="5" dir="auto" wire:model.defer="text" required minlength="10"
                maxlength="1000"
                class="shadow-sm focus:ring-purple-500 focus:border-purple-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                placeholder="{{ __('Comment Input Placeholder') }}"></textarea>
        </div>
        @error('token')
            <span class="text-red-500 text-xs">
                {!! Str::markdown(__('Token Validation Error')) !!}
            </span>
        @enderror
        @error('text')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex items-center justify-end gap-4 px-4 py-3 bg-gray-100 sm:px-6">
        <div wire:loading class="text-sm text-gray-400">
            {{ __('Saving') }}
        </div>
        @if (session()->has('message'))
            <div class="text-green-700 text-xs" x-data="{ show: true }"
                x-init="setTimeout(() => { show = false }, 3000)" x-show.transition="show">
                {{ session('message') }}
            </div>
        @endif
        <button type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            {{ __('Send') }}
        </button>
    </div>
</form>
