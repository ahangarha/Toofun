<x-guest-layout>
    <div class="relative w-full bg-purple-800 pt-36 pb-24 px-4">
        <div class="absolute inset-x-0 top-0 text-center">
            <div class="w-28 h-28 mx-auto -mt-10 bg-white rounded-xl transform rotate-45"></div>
            <div class="relative mx-auto -mt-10 text-purple-800 text-sm font-bold">{{ __('Topic') }}</div>
        </div>
        <div class="text-center text-white max-w-xl mx-auto">
            <h2 class="text-2xl font-bold" dir="auto">
                {{ $topic->title }}
            </h2>
            <p class="mt-6" dir="auto">
                {{ $topic->description }}
            </p>
        </div>
    </div>

    <div class="relative -mt-16 mx-4 sm:mx-0">
        <div class="text-center max-w-xl mx-auto text-sm mb-2 text-white">
            @if ($topic->isOpen())
                {{ __('Commenting Open Duration', ['duration' => $topic->openFor()]) }}
            @else
                @if ($topic->expired)
                    <div class="inline-block mx-auto mt-10 shadow py-4 px-10 bg-pink-600 font-bold rounded-full">
                        {{ __('Topic Expired Notice') }}
                    </div>
                @else
                    <div class="inline-block mx-auto mt-6 shadow py-4 px-10 bg-pink-600 font-bold rounded-full">
                        {{ __('Topic Will Expire', ['duration' => $topic->expiresIn()]) }}
                        <br>
                        {{ __('Random Order Notice') }}
                    </div>
                @endif
            @endif
        </div>

        @if ($topic->isOpen())
            <div class="max-w-lg mx-auto border rounded-3xl overflow-hidden bg-white shadow">
                <livewire:comment-form token="{{ $topic->token }}">
            </div>
            <div class="max-w-lg mx-auto mt-8 text-sm text-gray-500 list">
                <h3 class="mb-4">{{ __('Notice') }}:</h3>
                {!! Str::markdown(__('Commenting Notice Items')) !!}
            </div>
        @else
            <div class="max-w-xl mx-auto mt-12">
                <livewire:comments-list :comments="$comments">
            </div>
        @endif
    </div>
</x-guest-layout>
