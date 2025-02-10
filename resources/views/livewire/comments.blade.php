<div wire:poll.3000ms class="w-full mt-4 flex flex-col justify-center items-start">
    <!-- Comment Form -->
    <form wire:submit.prevent="addComment" class="w-full mb-4 flex justify-center items-center gap-2">
        <textarea wire:model.defer="content" class="w-full py-2 border rounded"
            placeholder="Write a comment..."></textarea>
        <button type="submit" name="content" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Post</button>
    </form>
    <!-- Display Comments -->
    <ul class="w-full">
        @foreach($post->comments->reverse() as $comment)
            <div class="border-b py-2 w-full">
                <div class="flex items-center gap-2">
                    <div>
                        @if ($post->user->profile_image)
                            <img src="{{ asset('storage/' . $post->user->profile_image) }}" alt="" class="w-10 h-10 rounded-full">
                        @else
                            <img src="{{ asset('images/blank-profile-picture.png') }}" alt="" class="w-10 h-10 rounded-full">
                        @endif
                    </div>
                    <div>
                        <strong>{{$post->user->name}} : </strong>{{ $comment->content }}
                        <span class="text-gray-500 text-sm">({{ $comment->created_at->diffForHumans() }})</span>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
</div>