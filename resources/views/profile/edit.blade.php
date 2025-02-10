<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- Display current profile image if available -->
                    @if(auth()->user()->profile_image)
                        <div>
                            <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile Image"
                                class="w-auto h-[150px] rounded-full">
                        </div>
                    @else
                        <div v>
                            <img src="{{ asset('images/blank-profile-picture.png') }}" alt="Profile Image"
                                class="w-auto h-[150px] rounded-full">
                        </div>
                    @endif

                    <!-- Form to update profile image -->
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT or PATCH for updates -->

                        <div>
                            <input type="file" name="profile_image" id="profile_image" accept="image/*"
                                class="mb-4 mt-4" required>
                        </div>

                        <!-- Display validation errors -->
                        @error('profile_image')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror

                        <div>
                            <x-primary-button>{{ __('Upload') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>