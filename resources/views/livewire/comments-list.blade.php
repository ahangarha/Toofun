<div wire-model="$comments">

    @foreach ($comments->shuffle()->all() as $comment)
        <div class="border rounded-xl mb-8 p-4 bg-gray-50 shadow" dir="auto">
            {{ $comment->text }}
        </div>
    @endforeach
</div>
