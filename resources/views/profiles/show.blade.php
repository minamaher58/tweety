<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <img class="rounded-xl mb-2" style="height: 250px; width: 100%" src="/images/cover-img.jpg">
            <img src="{{ $user->avatar }}"
                 class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                 width="150" alt="" style="left: 50%;">
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can('edit', $user)
                    <a href="/profiles/{{ $user->username }}/edit" class="rounded-full border border-gray-300 py-2 px-4 text-xs mr-2">
                        Edit Profile
                    </a>
                @endcan

                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <p class="text-sm">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>

    </header>

    @include('_timeline')

</x-app>
