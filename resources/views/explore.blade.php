<x-app>
    <div>
        @foreach($users as $user)
            <a href="/profiles/{{$user->username}}" class="flex items-center mb-5">
                <img src="{{ $user->avatar }}"
                     alt="{{ $user->username }}'s avatar"
                     width="60" class="mr-4 rounded">

                <div>
                    <h4 class="font-bold">{{  $user->username }}</h4>
                </div>
            </a>
        @endforeach
    </div>

    {{ $users->links() }}
</x-app>
