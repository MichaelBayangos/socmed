<div wire:poll.3000ms>
    <ul>
        @foreach ($posts->reverse() as $post)
            <li class="mb-2">
                <div class="w-full mt-4 flex justify-center items-center">
                    <div class="w-[60%] bg-white p-8 rounded-lg shadow-lg overflow-hidden">
                        <div class="flex justify-start items-center gap-2">
                            @if ($post->user->profile_image)
                                <img src="{{ asset('storage/' . $post->user->profile_image) }}" alt=""
                                    class="w-12 h-12 rounded-full">
                            @else
                                <img src="{{ asset('images/blank-profile-picture.png') }}" alt=""
                                    class="w-12 h-12 rounded-full">
                            @endif
                            <h2 class="font-semibold text-lg">{{ $post->user->name }}</h2>
                        </div>
                        <div class="ml-4 mb-2">
                            <p class="text-gray-500 text-sm">
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
                            <a href="{{route('post.show', ['post' => $post->id])}}">
                                <span>💬</span>
                                <span>
                                    {{ $post->comments->count() }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>