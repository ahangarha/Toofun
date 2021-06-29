<form method="post" wire:submit.prevent="store">
    @csrf
    <div class="px-4 py-5 bg-white sm:p-6">
        <input type="hidden" wire:model="token" readonly>
        <div class="relative" x-data="{wordCount:0}">
            <textarea id="comment" name="comment" rows="5" dir="auto" wire:model.lazy="text" required minlength="10"
                maxlength="1000" x-on:keyup="wordCount = document.querySelector('textarea#comment').value.length"
                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                placeholder="Add some description about this topic"></textarea>
            <span class="absolute right-0 -bottom-4 text-xs text-gray-400" x-text="wordCount+'/1000'">0/1000</span>
        </div>
        @error('token')
            <span class="text-red-500 text-xs">
                There is an issue, connecting the comment to the topic.
                <br>
                Please check if the topic is still open for commenting.
            </span>
        @enderror
        @error('text')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex items-center justify-end gap-4 px-4 py-3 bg-gray-50 sm:px-6">
        <div wire:loading class="text-sm text-gray-400">
            Saving...
        </div>
        @if (session()->has('message'))
            <div class="text-green-700 text-xs" x-data="{ show: true }"
                x-init="setTimeout(() => { show = false }, 3000)" x-show.transition="show">
                {{ session('message') }}
            </div>
        @endif
        <button type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Send
        </button>
    </div>
</form>
