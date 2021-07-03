<div wire-model="$comments">
    @forelse ($comments->shuffle()->all() as $comment)
        <div class="border rounded-lg mb-8 p-4 bg-white text-md shadow" dir="auto">
            {{ $comment->text }}
        </div>
    @empty
        <div class="text-center">
            No comment available
        </div>
    @endforelse
</div>
