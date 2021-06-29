<x-guest-layout>
    <div class="text-center max-w-xl mx-auto bg-gray-200 p-8 rounded-xl">
        <h2 class="text-2xl font-bold">
            {{ $topic->title }}
        </h2>
        <p class="mt-8">
            {{ $topic->description }}
        </p>

    </div>

    <div class="text-center max-w-xl mx-auto text-sm italic my-8 text-gray-400">
        @if ($topic->isOpen())
            This topic is open for commenting for next {{ $topic->openFor() }}.
        @else
            This topic will be expired in {{ $topic->expiresIn() }}.
            <br>
            NOTE: Comments are listed randomly.
        @endif
    </div>

    @if ($topic->isOpen())
        <div class="max-w-xl mx-auto border rounded-xl p-4 bg-white shadow">
            <livewire:comment-form token="{{ $topic->token }}">
        </div>
    @else
        <div class="max-w-xl mx-auto">
            <livewire:comments-list :comments="$comments">
        </div>
    @endif
</x-guest-layout>
