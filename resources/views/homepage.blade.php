<x-guest-layout>
    <div class="relative text-center text-white w-full mx-auto overflow-x-hidden pb-4">
        <div class="absolute inset-x-0 top-0 flex justify-center">
            <div class="w-120 h-120 -m-64 bg-purple-800 rounded-3xl transform rotate-45"></div>
        </div>
        <div class="relative mt-24 mb-24 md:mb-36" dir="auto">
            <h2 class="text-2xl font-bold mb-4">Make a Storm</h2>
            <p class="w-44 mx-auto">To start with brainstroming, make a topic and invite others for commenting.</p>
        </div>
    </div>

    <div class="w-80 mx-auto my-16">
        <div
            class="grid ggrid-cols-1 grid-cols-2  text-purple-800 border-purple-200 text-center border-4 rounded-3xl overflow-hidden shadow">
            <a class="p-4 hover:bg-purple-100 border-e-2 border-purple-200" href="#createTopic">
                <h3 class="text-lg font-bold">Create Topic</h3>
            </a>
            <a class="p-4 hover:bg-purple-100" href="#seeTopic">
                <h3 class="text-lg font-bold">See Topic</h3>
            </a>
        </div>
    </div>

    <div class="flex flex-col gap-2 w-80 mx-auto my-16 text-center text-gray-700 text-md">
        <p>No registration needed.</p>
        <p>No personal information collected.</p>
        <p>Comments are anonymous.</p>
        <p>Comments are hidden during commenting time.</p>
        <p>Comments appear in random order.</p>
        <p>Topics will be deleted after one week.</p>
        <div class="w-4 h-4 transform rotate-45 bg-purple-800 mx-auto my-8"></div>
        <p>Toofun is a Free/Libre& Open Source software.</p>
    </div>

    <div x-cloak x-data="{
        checkModalVisibility() {
            this.trash1 = location.hash==='#createTopic';
            this.trash2 = location.hash==='#seeTopic';
        }
    }">
        {{-- Modal 1: create topic --}}
        <div class="fixed bg-gray-900 bg-opacity-50 inset-0 flex justify-center items-center"
            x-show.transition="location.hash==='#createTopic'" x-on:hashchange.window="checkModalVisibility()"
            x-init="location.hash==='#createTopic'">
            <div class="w-full h-full sm:h-auto flex flex-col justify-between sm:max-w-lg bg-white shadow-lg sm:border-2 sm:rounded-xl overflow-hidden"
                x-on:click.away="location.hash='#none'">
                <div class="flex justify-between items-center border-b px-4 py-3">
                    <h3>Create a New Topic</h3>
                    <div class="cursor-pointer" x-on:click="location.hash='#none'">
                        <svg class="w-10 h-10 hover:rotate-90 transform transition" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </div>
                </div>

                <form action="{{ route('topic-store') }}" method="POST" class="h-full flex flex-col justify-between">
                    @csrf
                    <div class="px-4 py-5 bg-white space-y-6 my-4">
                        <div>
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">
                                    Title
                                </label>
                                <input type="text" name="title" id="title" minlength="5" maxlength="80" required
                                    dir="auto"
                                    class="focus:ring-purple-500 focus:border-purple-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
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
                                    class="shadow-sm focus:ring-purple-500 focus:border-purple-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
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
                                        class="focus:ring-purple-500 focus:border-purple-500 flex-1 block w-full rounded-none rounded-s-md sm:text-sm border-gray-300"
                                        placeholder="Some duration for this topic" value="24">
                                    <span
                                        class="inline-flex items-center px-3 rounded-e-md border border-s-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
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

                    <div class="flex justify-between items-center px-4 py-3 bg-purple-100">
                        <div class="ps-4">{{-- MESSAGE --}}</div>
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Modal 1: see topic --}}
        <div class="fixed bg-gray-900 bg-opacity-50 inset-0 flex justify-center items-center"
            x-show.transition="location.hash==='#seeTopic'" x-on:hashchange.window="checkModalVisibility()"
            x-init="location.hash==='#seeTopic'">
            <div class="w-full h-full sm:h-auto flex flex-col justify-between sm:max-w-lg bg-white shadow-lg sm:border-2 sm:rounded-xl overflow-hidden"
                x-data="{url:''}" x-on:click.away="location.hash='#none'">
                <div class="flex justify-between items-center border-b px-4 py-3">
                    <h3>See the Topic</h3>
                    <div class="cursor-pointer" x-on:click="location.hash='#none'">
                        <svg class="w-10 h-10 hover:rotate-90 transform transition" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </div>
                </div>

                <div class="px-4 py-5 bg-white space-y-6 my-4">
                    <div>
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">
                                Topic Token
                            </label>
                            <input type="text" name="token" id="token" minlength="16" maxlength="16" required
                                x-model="url" dir="auto"
                                class="focus:ring-purple-500 focus:border-purple-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                placeholder="Some title for this topic">
                            @error('title')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="flex justify-between items-center px-4 py-3 bg-purple-100">
                    <div class="ps-4">{{-- MESSAGE --}}</div>
                    <a :href="'/topic/'+url"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        See
                    </a>
                </div>
            </div>
        </div>
</x-guest-layout>
