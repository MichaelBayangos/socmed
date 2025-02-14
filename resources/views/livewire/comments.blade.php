<div wire:poll.10000ms class="w-full mt-4 flex flex-col justify-center items-start space-y-4">
    <ul class="w-full mb-6 space-y-4">
        @if ($post->comments->isEmpty())
            <p class="text-gray-500 text-sm text-center">No comments yet.</p>
        @else
            @foreach($post->comments->reverse() as $comment)
                <li class="flex items-start gap-3 border-b pb-3">
                    <img src="{{ $comment->user->profile_image ? asset('storage/' . $comment->user->profile_image) : asset('images/blank-profile-picture.png') }}"
                        alt="User profile" class="w-10 h-10 rounded-full object-cover">

                    <div class="w-[90%] p-3 rounded-lg">
                        <div class="flex items-center justify-between">
                            <strong class="text-gray-800">{{ $comment->user->name }}</strong>
                            <div class="flex  items-end gap-4">
                                <span class="text-gray-500 text-xs">{{ $comment->created_at->diffForHumans() }}</span>
                                @if(auth()->id() === $comment->user_id || auth()->id() === $post->user_id)
                                    <button wire:click="delete({{ $comment->id }})" type="button"
                                        class="text-gray-500 text-xs hover:text-red-500">Delete</button>
                                @endif
                            </div>
                        </div>
                        <p class="mt-1 text-gray-700 break-words">
                            {{ $comment->content }}
                        </p>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
    <form wire:submit.prevent="addComment" class="w-full flex justify-center items-center gap-2">
        <textarea wire:model="content" class="w-full py-2 border rounded" name="content"
            placeholder="Write a comment..."></textarea>
        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Post</button>
    </form>
</div>