
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <uL>
        @forelse(auth()->user()->follows as $user)
            <li class="{{ $loop->last ? '' : 'mb-4' }} mb-4">
                <div>
                    <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">

                    <img src="{{ $user->avatar }}" class="rounded-full mr-2" width="40" height="40" alt="">
                    {{ $user->name }}
                    </a>
                </div>
            </li>
        @empty
            <li>No friends Yet!</li>
        @endforelse
    </uL>
