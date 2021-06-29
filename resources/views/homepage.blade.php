<x-guest-layout>
    <div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-center">
            <a class="border rounded-xl p-8 bg-indigo-100 hover:bg-indigo-200 transform transition hover:-translate-y-1 hover:shadow-lg"
                href="{{ route('topic-create') }}">
                <h2 class="text-2xl font-bold">Add New Topic</h2>
                <h3>and ask for comments</h3>
            </a>
            <a class="border rounded-xl p-8 bg-indigo-100 hover:bg-indigo-200 transform transition hover:-translate-y-1 hover:shadow-lg"
                href="{{ route('topic-index') }}">
                <h2 class="text-2xl font-bold"> Check a Topic </h2>
                <h3>to see/add comments</h3>
            </a>
        </div>
    </div>
</x-guest-layout>
