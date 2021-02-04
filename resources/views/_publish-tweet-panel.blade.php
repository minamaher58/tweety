<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="post" action="/tweets">
        @csrf

        <textarea name="body" id="" class="w-full outline-none"
                  placeholder="what's up" required autofocus>

        </textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">

            <img src="{{ auth()->user()->avatar }}" class="rounded-full mr-2" width="40" height="40" alt="your avatar">
            <button type="submit"  class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow py-2 px-10 text-sm text-white h-10">Tweet</button>

        </footer>
    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
