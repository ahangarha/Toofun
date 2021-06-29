<x-guest-layout>
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Add Topic</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        People need a topic to do brainstormin about. Chosse a good title, add some description and
                        specify the duration in which people can comment.
                    </p>
                    <p class="mt-2 text-sm text-gray-600">
                        After making a topic, you get a unique link that can be shared with others. No comment would be
                        visible till the end of commenting time. After that, the topic gets freezed and no comment can
                        be made.
                    </p>
                    <hr class="my-4">
                    <p class="mt-2 text-sm text-gray-600">
                        <b>Notice:</b> After making a topic, you cannot change or delete it.
                    </p>
                    <p class="mt-2 text-sm text-gray-600">
                        <b>Notice:</b> Topics will remain acitve for a week. Then after it will get removed
                        permenantly.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('topic-store') }}" method="POST">
                    @csrf
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                        Title
                                    </label>
                                    <input type="text" name="title" id="title" minlength="5" maxlength="80" required
                                        dir="auto"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                        placeholder="Some title for this topic">
                                    @error('title')
                                        <p class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">
                                    Description
                                </label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" rows="3" maxlength="1000" dir="auto"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                        placeholder="Add some description about this topic"></textarea>
                                </div>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="duration" class="block text-sm font-medium text-gray-700">
                                        Duration for commenting
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="number" name="duration" id="duration" min="1" max="48"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300"
                                            placeholder="Some duration for this topic" value="24">
                                        <span
                                            class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                            Hours
                                        </span>
                                    </div>
                                    @error('duration')
                                        <p class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
