<div wire:poll.3000ms>
    <ul>
        @foreach ($posts->reverse() as $post)
            <li class="mb-2">
                <div class="w-full mt-4 flex justify-center items-center">
                    <div class="w-[60%] bg-white p-8 rounded-lg shadow-lg overflow-hidden">
                        <div class="ml-4 mb-2">
                            <h2 class="font-semibold text-lg">{{ $post->user->name }}</h2>
                            <p class="text-black text-sm">
                                {{ $post->created_at->format('D, F, Y') }}
                            </p>
                        </div>
                        <div class="px-4 pb-4">
                            <p>{{ $post->content }}</p>
                        </div>
                        <div class="px-4 pb-4">
                            <!-- Replace the traditional form with a Livewire action -->
                            <button wire:click="toggleLike({{ $post->id }})">
                                @if($post->likes->where('user_id', auth()->user()->id)->first())
                                    <span>❤️</span>
                                @else
                                    <span>🤍</span>
                                @endif
                            </button>
                            <span>
                                {{ $post->likes->count() }}
                            </span>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>