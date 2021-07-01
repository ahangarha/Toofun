<div wire-model="$comments">
    @foreach ($comments->shuffle()->all() as $comment)
        <div class="border rounded-lg mb-8 p-4 bg-white text-md shadow" dir="auto">
            {{ $comment->text }}
        </div>
    @endforeach
</div>
