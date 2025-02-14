<x-app-layout title="Comments">
    <div class="w-full mt-4 mb-4 flex justify-center items-center">
        <div class="w-[60%] bg-white p-8 rounded-lg shadow-lg overflow-hidden">
            <div class="flex justify-start items-center gap-2 mb-2">
                @if ($post->user->profile_image)
                    <img src="{{ asset('storage/' . $post->user->profile_image) }}" alt="" class="w-12 h-12 rounded-full">
                @else
                    <img src="{{ asset('images/blank-profile-picture.png') }}" alt="" class="w-12 h-12 rounded-full">
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
            <div class="ml-4 mb-2">
                <p class="text-gray-500 text-sm">
                    Comments
                </p>
            </div>
            <hr>
            <div class="px-4 pb-4">
                <livewire:comments :post="$post" content="" />
            </div>
        </div>
    </div>
</x-app-layout>