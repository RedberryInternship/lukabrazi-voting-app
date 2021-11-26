<div
    x-data
    @click="
                    if($event.target.tagName.toLowerCase() !== 'button' && $event.target.tagName.toLowerCase() !== 'svg'
                    && $event.target.tagName.toLowerCase() !== 'path' && $event.target.tagName.toLowerCase() !== 'a')
                    {
                        $event.target.closest('.idea-container').querySelector('.idea-link').click();
                    }
                "
    class="idea-container hover:shadow-card cursor-pointer transition duration-150 ease-in bg-white rounded-xl flex">
    <div class="hidden md:block border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            <div class="font-semibold text-2xl @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
            <div class="text-gray-500">Votes</div>
        </div>
        <div class="mt-8">
            @if($hasVoted)
                <button
                    wire:click.prevent="vote"
                    class="w-20 bg-blue border border-blue text-white hover:bg-blue-hover transition duration-150 ease-in
                         font-bold text-xss uppercase rounded-xl px-4 py-3">
                    Voted
                </button>
                @else
                <button
                    wire:click.prevent="vote"
                    class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in
                         font-bold text-xss uppercase rounded-xl px-4 py-3">
                    Vote
                </button>
            @endif
        </div>
    </div>
    <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
        <div class="flex-shrink-0 mx-2 md:mx-0">
            <a href="#">
                <img src="{{ $idea->user->getAvatar() }}" alt="avatar"
                     class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="w-full flex flex-col justify-between mx-2 md:mx-4">
            <h4 class="text-xl font-semibold mt-2 md:mt-0">
                <a href="{{ route('idea.show', $idea) }}"
                   class="idea-link hover:underline">{{ $idea->title }}</a>
            </h4>
            <div class="text-gray-600 mt-3 line-clamp-3">
                {{ $idea->description }}
            </div>
            <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div>{{ $idea->created_at->diffForHumans() }}</div>
                    <div>&bull;</div>
                    <div>{{ $idea->category->name }}</div>
                    <div>&bull;</div>
                    <div class="text-gray-900">3 Comments</div>
                </div>
                <div
                    x-data="{ isOpen: false }"
                    class="flex items-center space-x-2 mt-4 md:mt-0"
                >
                    <div
                        class="{{ $idea->status->classes }} text-xss font-bold uppercase
                                leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                        {{ $idea->status->name }}
                    </div>
                    <button
                        x-on:click="isOpen = !isOpen"
                        class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-150 ease-in py-2 px-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                        </svg>
                        <ul
                            x-cloak
                            x-show="isOpen" x-transition.origin.top
                            @click.outside="isOpen = false"
                            @keydown.esc.window="isOpen = false"
                            class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 top-5 md:ml-8 top-8 md:top-6 right-0 md:left-0">
                            <li>
                                <a href="#"
                                   class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in block">Mark
                                    as Spam</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in block">Delete
                                    Post</a>
                            </li>
                        </ul>
                    </button>
                </div>

                <div class="flex items-center md:hidden mt-4 md:mt-0">
                    <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                        <div class="text-sm font-bold leading-none">{{ $votesCount }}</div>
                        <div class="text-xss font-semibold leading-none text-gray-400">Votes</div>
                    </div>
                    @if($hasVoted)
                        <button
                            wire:click.prevent="vote"
                            class="w-20 bg-blue text-white border border-gray-200 hover:bg-blue-hover transition duration-150 ease-in
                                font-bold text-xss uppercase rounded-xl px-4 py-3 -mx-5">
                            Voted
                        </button>
                    @else
                        <button
                            wire:click.prevent="vote"
                            class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in
                                font-bold text-xss uppercase rounded-xl px-4 py-3 -mx-5">
                            Vote
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> {{-- end idea-container --}}
