<x-app-layout title="Home">
    <form method="post" action="{{route('post.store')}}">
        @csrf
        <div class="w-full mt-4 flex justify-center items-center">
            <div class="w-[60%]">
                <div class=" bg-white border border-slate-200 grid grid-cols-6 gap-2 rounded-xl p-2 text-sm">
                    <h1 class="ml-2 text-slate-700 text-xl font-bold col-span-6">Create Post</h1>
                    <textarea name="content"
                        class="bg-slate-100 text-slate-600 h-28 placeholder:text-slate-600 placeholder:opacity-50 border border-slate-200 col-span-6 resize-none outline-none rounded-lg p-2 duration-300 focus:border-slate-600"></textarea>
                    <span class="col-span-2"></span>
                    <span class="col-span-2"></span>
                    <button type="submit"
                        class="bg-blue-700 text-white col-span-2 flex justify-center rounded-lg p-2 duration-300fo  cus:bg-blue-400">
                        Post
                    </button>
                </div>
            </div>
        </div>
    </form>
    <livewire:post-list />
    <div class="w-full mt-4 flex justify-center items-center">
        <div class="w-[60%] p-8 rounded-lg shadow-lg overflow-hidden">
            <div class="ml-4 mb-2">
                <p class="text-center text-gray-500">No post available</p>
            </div>
        </div>
    </div>
</x-app-layout>